<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
      $sections= DB::table('dept')->get();

      $date=date('y-m-d');
      $time=date('H:i:s');

      // pass the values from controller to the view using withSomething
            return view('home')->withDate($date)->withTime($time)->withSections($sections);
    }
}
