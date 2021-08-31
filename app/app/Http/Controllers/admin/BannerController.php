<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Banner;
use Validator;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getbanner = Banner::all();
        return view('banner',compact('getbanner'));
    }

    public function list()
    {
        $getbanner = Banner::all();
        return view('theme.bannertable',compact('getbanner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $s
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
          'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        $error_array = array();
        $success_output = '';
        if ($validation->fails())
        {
            foreach($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages;
            }
        }
        else
        {
            $image = 'banner-' . uniqid() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move('public/images/banner', $image);

            $banner = new Banner;
            $banner->image =$image;
            $banner->save();
            $success_output = '¡Banner agregado exitosamente!';
        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $banner = Banner::findorFail($request->id);
        $getbanner = Banner::where('id',$request->id)->first();
        if($getbanner->image){
            $getbanner->img=url('public/images/banner/'.$getbanner->image);
        }
        return response()->json(['ResponseCode' => 1, 'ResponseText' => 'Banner recuperado correctamente', 'ResponseData' => $getbanner], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validation = Validator::make($request->all(),[
          'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $error_array = array();
        $success_output = '';
        if ($validation->fails())
        {
            foreach($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages;
            }
        }
        else
        {
            $banner = new Banner;
            $banner->exists = true;
            $banner->id = $request->id;

            if(isset($request->image)){
                if($request->hasFile('image')){
                    $image = $request->file('image');
                    $image = 'banner-' . uniqid() . '.' . $request->image->getClientOriginalExtension();
                    $request->image->move('public/images/banner', $image);
                    $banner->image=$image;
                    unlink(public_path('images/banner/'.$request->old_img));
                }            
            }
            $banner->save();           

            $success_output = 'Banner actualizado con éxito!';
        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $getbanner = Banner::where('id',$request->id)->first();

        unlink(public_path('images/banner/'.$getbanner->image));

        $banner=Banner::where('id', $request->id)->delete();
        if ($banner) {
            return 1;
        } else {
            return 0;
        }
    }
}
