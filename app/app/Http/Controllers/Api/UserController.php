<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\User;
use Validator;

class UserController extends Controller
{
    public function register(Request $request )
    {
        if($request->email == ""){
            return response()->json(["status"=>0,"message"=>"Se requiere un correo electrónico"],400);
        }
        if($request->password == ""){
            return response()->json(["status"=>0,"message"=>"Se requiere una contraseña"],400);
        }
        if($request->name == ""){
            return response()->json(["status"=>0,"message"=>"Se requiere el nombre"],400);
        }
        if($request->mobile == ""){
            return response()->json(["status"=>0,"message"=>"Se requiere un número de teléfono"],400);
        }

        $checkemail=User::where('email',$request['email'])->first();
        
        if(!empty($checkemail))
        {
            return response()->json(['status'=>0,'message'=>'El correo electrónico ya existe.'],400);
        }

        $checkmobile=User::where('mobile',$request['mobile'])->first();
        
        if(!empty($checkmobile))
        {
            return response()->json(['status'=>0,'message'=>'El número de teléfono ya existe.'],400);
        }

        $otp = rand ( 100000 , 999999 );

        try{
            $title='Email Verification Code';
            $email=$request->email;
            $data=['title'=>$title,'email'=>$email,'otp'=>$otp];

            Mail::send('Email.emailverification',$data,function($message)use($data){
                $message->from(env('MAIL_USERNAME'))->subject($data['title']);
                $message->to($data['email']);
            } );

            $data['name']=$request->get('name');
            $data['mobile']=$request->get('mobile');
            $data['email']=$request->get('email');
            $data['profile_image']='unknown.png';
            $data['password']=Hash::make($request->get('password'));
            $data['otp']=$otp;
            $data['type']='2';
            $user=User::create($data);
            if($user)
            {
                $arrayName = array(
                    'id' => $user->id
                );

                return response()->json(['status'=>1,'message'=>'Registro exitoso','data'=>$arrayName],200);
            }
            else
            {
                return response()->json(['status'=>0,'message'=>'Algo salió mal'],400);
            }
        }catch(\Swift_TransportException $e){
            $response = $e->getMessage() ;
            return response()->json(['status'=>0,'message'=>'Algo salió mal al enviar el correo electrónico Por favor, inténtelo de nuevo...'],200);
        }
    }

    public function emailverify(Request $request )
    {
        if($request->email == ""){
            return response()->json(["status"=>0,"message"=>"El correo electrónico es obligatorio"],400);
        }
        if($request->otp == ""){
            return response()->json(["status"=>0,"message"=>"Se requiere código de verificación"],400);
        }
        if($request->token == ""){
            return response()->json(["status"=>0,"message"=>"Token es requerido"],400);
        }

        $checkuser=User::where('email',$request->email)->first();

        if (!empty($checkuser)) {
        	if ($checkuser->otp == $request->otp) {
	        	$update=User::where('email',$request['email'])->update(['otp'=>NULL,'is_verified'=>'1','token'=>$request->token]);

                $arrayName = array(
                    'id' => $checkuser->id,
                    'name' => $checkuser->name,
                    'mobile' => $checkuser->mobile,
                    'email' => $checkuser->email,
                );

                return response()->json(['status'=>1,'message'=>"El correo electrónico ha sido verificado",'data'=>$arrayName],200);

	        } else {
	        	return response()->json(["status"=>0,"message"=>"Código de seguridad incorrecto"],400);
	        }  
        } else {
        	return response()->json(["status"=>0,"message"=>"Dirección de correo electrónico no válida"],400);
        }  
    }

    public function resendemailverification(Request $request )
    {
        if($request->email == ""){
            return response()->json(["status"=>0,"message"=>"El correo electrónico es obligatorio"],400);
        }

        $checkuser=User::where('email',$request->email)->first();

        if (!empty($checkuser)) {       	

            try{
                $otp = rand ( 100000 , 999999 );

                $update=User::where('email',$request['email'])->update(['otp'=>$otp,'is_verified'=>'2']);

                $title='Email Verification Code';
                $email=$request->email;
                $data=['title'=>$title,'email'=>$email,'otp'=>$otp];

                Mail::send('Email.emailverification',$data,function($message)use($data){
                    $message->from(env('MAIL_USERNAME'))->subject($data['title']);
                    $message->to($data['email']);
                } );
            }catch(\Swift_TransportException $e){
                $response = $e->getMessage() ;
                return response()->json(['status'=>0,'message'=>'Algo salió mal al enviar el correo electrónico Por favor, inténtelo de nuevo...'],200);
            }

        	return response()->json(["status"=>1,"message"=>"Se ha enviado un correo a su dirección de correo electrónico registrada"],200);

        } else {
        	return response()->json(["status"=>0,"message"=>"Dirección de correo electrónico no válida"],400);
        }  
    }

    public function login(Request $request )
    {
        if($request->email == ""){
            return response()->json(["status"=>0,"message"=>"Se requiere la identificación del correo electrónico"],400);
        }
        if($request->password == ""){
            return response()->json(["status"=>0,"message"=>"Se requiere una contraseña"],400);
        }
        
        $login=User::where('email',$request['email'])->where('type','=','2')->first();

        if(!empty($login))
        {
        	if($login->is_verified == '1') 
            {
	            if($login->is_available == '1') 
	            {
	                if(Hash::check($request->get('password'),$login->password))
	                {
	                    $arrayName = array(
	                        'id' => $login->id,
	                        'name' => $login->name,
	                        'mobile' => $login->mobile,
	                        'email' => $login->email,
	                    );

	                    $data=array('user'=>$arrayName);
	                    $status=1;
	                    $message='Login Successful';

	                    $data_token['token'] = $request['token'];
	                    $update=User::where('email',$request['email'])->update($data_token);

	                    return response()->json(['status'=>$status,'message'=>$message,'data'=>$arrayName],200);
	                }
	                else
	                {
	                    $status=0;
	                    $message='Contraseña incorrecta';
	                    return response()->json(['status'=>$status,'message'=>$message],422);
	                }
	            }
	            else
	            {
	                $status=0;
	                $message='Tu cuenta fue bloqueada por el administrador';
	                return response()->json(['status'=>$status,'message'=>$message],422);
	            }
	        } else {
                $status=2;
                $message="No has verificado tu dirección de correo electrónico";
                return response()->json(['status'=>$status,'message'=>$message],422);
            }
        }
        else
        {
            $status=0;
            $message='El correo electrónico es incorrecto';
            $data="";
            return response()->json(['status'=>$status,'message'=>$message],422);
        }
        
       
        return response()->json(['status'=>$status,'message'=>$message,'data'=>$data],200);
    }

    public function getprofile(Request $request )
    {
        if($request->user_id == ""){
            return response()->json(["status"=>0,"message"=>"User ID is required"],400);
        }

        $users = User::where('id',$request['user_id'])->get()->first();

        if ($users->mobile == "") {
            $mobile = "";
        } else {
            $mobile = $users->mobile;
        }

        $arrayName = array(
            'id' => $users->id,
            'name' => $users->name,
            'mobile' => $mobile,
            'email' => $users->email,
            'profile_image' => url('/public/images/profile/'.$users->profile_image)
        );


        if(!empty($arrayName))
        {
            return response()->json(['status'=>1,'message'=>'Datos del perfil','data'=>$arrayName],200);
        } else {
            $status=0;
            $message='Usuario no encontrado';
            $data="";
            return response()->json(['status'=>$status,'message'=>$message],422);
        }

        return response()->json(['status'=>$status,'message'=>$message,'data'=>$data],200);
    }

    public function editprofile(Request $request )
    {
        if($request->user_id == ""){
            return response()->json(["status"=>0,"message"=>"Se requiere la identificación del usuario"],400);
        }
        if($request->name == ""){
            return response()->json(["status"=>0,"message"=>"El nombre es obligatorio"],400);
        }

        $user = new User;
        $user->exists = true;
        $user->id = $request->user_id;

        if(isset($request->image)){
            if($request->hasFile('image')){
                $image = $request->file('image');
                $image = 'profile-' . uniqid() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move('public/images/profile', $image);
                $user->profile_image=$image;
            }            
        }
        $user->name =$request->name;
        $user->save();

        if($user)
        {
            return response()->json(['status'=>1,'message'=>'Su perfil fue actualizado'],200);
        }
        else
        {
            return response()->json(['status'=>0,'message'=>'Algo salió mal'],400);
        }
    }

    public function changepassword(Request $request)
    {
        if($request->user_id == ""){
            return response()->json(["status"=>0,"message"=>"Se requiere un usuario"],400);
        }
        if($request->old_password == ""){
            return response()->json(["status"=>0,"message"=>"Se requiere su contraseña antigua"],400);
        }
        if($request->new_password == ""){
            return response()->json(["status"=>0,"message"=>"Se requiere una nueva contraseña"],400);
        }
        if($request['old_password']==$request['new_password'])
        {
            return response()->json(['status'=>0,'message'=>'La contraseña antigua y la nueva deben ser diferentes'],400);
        }
        $check_user=User::where('id',$request['user_id'])->get()->first();
        if(Hash::check($request['old_password'],$check_user->password))
        {
            $data['password']=Hash::make($request['new_password']);
            $update=User::where('id',$request['user_id'])->update($data);
            return response()->json(['status'=>1,'message'=>'Contraseña actualizada'],200);
        }
        else{
            return response()->json(['status'=>0,'message'=>'Contraseña incorrecta'],400);
        }
    }

    public function restaurantslocation(Request $request)
    {
        $trucklocation=User::select('lat','lang')->where('type','1')->first();
        if(!empty($trucklocation))
        {
            return response()->json(['status'=>1,'message'=>'Ubicación','data'=>$trucklocation],200);
        }
        else
        {
            return response()->json(['status'=>0,'message'=>'No se han encontrado datos'],200);
        }
    }

    public function forgotPassword(Request $request)
    {
        if($request->email == ""){
            return response()->json(["status"=>0,"message"=>"Se requiere la identificación del correo electrónico"],400);
        }

        $checklogin=User::where('email',$request['email'])->first();
        
        if(empty($checklogin))
        {
            return response()->json(['status'=>0,'message'=>'El correo electrónico no existe'],400);
        }
        else {
            try{
                $password = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789') , 0 , 8 );
                $newpassword['password'] = Hash::make($password);
                $update = User::where('email', $request['email'])->update($newpassword);

                $title='Password Reset';
                $email=$checklogin->email;
                $data=['title'=>$title,'email'=>$email,'password'=>$password];

                Mail::send('Email.email',$data,function($message)use($data){
                    $message->from(env('MAIL_USERNAME'))->subject($data['title']);
                    $message->to($data['email']);
                } );
                return response()->json(['status'=>1,'message'=>'Nueva contraseña enviada a su dirección de correo electrónico'],200);
            }catch(\Swift_TransportException $e){
                $response = $e->getMessage() ;
                return response()->json(['status'=>0,'message'=>'Algo salió mal al enviar el correo electrónico Por favor, inténtelo de nuevo...'],200);
            }
        }

    }
}
