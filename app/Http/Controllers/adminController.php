<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Dept;
use DB;





class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
   {
    $this->middleware('auth');
   }

   
    public function index()
    {
    
      $date=date('y-m-d');
      $time=date('H:i:s');

      $sections=Dept::withTrashed()->get();

      return view('admin')->withSections($sections)->withDate($date)->withTime($time);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // Create a new Department
    public function store(Request $request)
    {
        //get the name and the file from the form 
        $section_name=$request ->input('dept_title');
        $file=$request ->file('image');
        $destination='images';
        $file_name=$file->getClientOriginalName();
        $file->move($destination,$file_name);

        // using Eloquent Model 
        //create a new deparmetn
        $department=new Dept;
        // set the department name
        $department->title=$section_name;
        // set the department image(description)
        $department->description=$file_name;
        // save the model 
        $department->save();
        session()->push('m','success');
        session()->push('m', 'Department has been created Succesfully');

        // redirect to the home page 
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // Show the specifications of a specific department
    public function show($id)
    {
        return redirect('/department/'.$id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        //
    }

    /**
     * Update the name of a specified department
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // get the updated name from the form
        $dept_name=$request->input('dept_title');

        // find the required departemtn
        $department=Dept::find($id);
        // update the department name
        $department->title=$dept_name;
        // save the department
        $department->save();
        // redirect to the main page 
        session()->push('m','success');
        session()->push('m', 'Department has been updated Succesfully');
        return redirect('/admin');
    }

    /**
     * Remove the specified department from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        // find all the objects with the specified id 
        $department=Dept::withTrashed()->find($id);

    // if it was deletd before ... then force delete it 
        if($department->trashed()){

             $department->forceDelete();
              session()->push('m','danger');
               session()->push('m', 'Department has been deleted permenately');

           }
    // else just soft delete 
        else{

             $department->delete();
                session()->push('m','danger');
               session()->push('m', 'Department has been deleted temporary');
        }

        return redirect('/admin');
    }


   // Restore the deleted department  
    public function restore($id){

        // find the destroyed department
        $department=Dept::onlyTrashed()->find($id);
        // restore it 
        $department->restore();
           session()->push('m','info');
               session()->push('m', 'Department has been restored');

        return redirect('/admin');
    }
}
