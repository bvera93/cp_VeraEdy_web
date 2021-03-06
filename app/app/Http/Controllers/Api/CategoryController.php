<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Helpers\BaseFunction;
use App\Category;
use Validator;

class CategoryController extends Controller
{
    public function category(Request $request)
    {
    	$categorydata=Category::select('id','category_name',\DB::raw("CONCAT('".url('/public/images/category/')."/', image) AS image"))
        ->where('is_available','=','1')
        ->get();
        if(!empty($categorydata))
        {
        	return response()->json(['status'=>1,'message'=>'Categoría exitosa','data'=>$categorydata],200);
        }
        else
        {
            return response()->json(['status'=>0,'message'=>'Datos no encontrados'],200);
        }
    }
}
