<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PrivacyPolicy;

class PrivacyPolicyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function policy() {
        $getprivacypolicy = PrivacyPolicy::where('id', '1')->first();
        return view('privacy-policy', compact('getprivacypolicy'));
    }
	
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
		$getprivacypolicy = PrivacyPolicy::where('id','1')->first();
		return view('privacy-policy',compact('getprivacypolicy'));
		
    }
}
