<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dept;
use DB;



class depController extends Controller
{



    public function __construct()
{
    $this->middleware('auth');
}


  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index($id)
    {

        $date=date('y-m-d');
        $time=date('H:i:s');
        $department=Dept::find($id);

        $emps=DB::table('dept')->join('empl','empl.dept_id','=','dept.id')->where('dept.id',$id)->paginate(2);
        return view('departmentView')->withDepartment($department)->withDate($date)->withTime($time)->withEmps($emps);

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id,Request $request)
    {
     
        // get the values 
        $emp_name=$request->input('emp_name');
        $emp_phone=$request->input('emp_phone');
        $emp_work_desc=$request->input('emp_work_desc');

        // store a new Employee inside the departmetn with the id of ($id)
        DB::table('empl')->insert(['name'=>$emp_name,'phone'=> $emp_phone,'work_desc'=> $emp_work_desc,'dept_id'=>$id]);
        return redirect('department/'.$id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



}
