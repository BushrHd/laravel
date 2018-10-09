<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
{
    $this->middleware('auth');
}






       /// This is called base controller or basic controller because we're accesscing the controller with explicit parameter name 
    public function getIndex(){

      $sections= DB::table('dept')->get();

      $date=date('y-m-d');
      $time=date('H:i:s');

      // pass the values from controller to the view using withSomething
    	    return view('home')->withDate($date)->withTime($time)->withSections($sections);
    }

}
