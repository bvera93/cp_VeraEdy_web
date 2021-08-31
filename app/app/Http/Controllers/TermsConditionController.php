<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TermsCondition;

class TermsConditionController extends Controller
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

    public function termsconditions() {
        $gettermsconditions = TermsCondition::where('id', '1')->first();
        return view('terms-condition', compact('gettermsconditions'));
    }
	
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
		$gettermscondition = TermsCondition::where('id','1')->first();
		return view('terms-condition',compact('gettermscondition'));
		
    }
}
