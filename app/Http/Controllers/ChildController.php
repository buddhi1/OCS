<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Child;

class ChildController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $children = DB::table('children')->get();
        return view('child.index')
                    ->with('children', $children);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return the child create form
        return view('child.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $child = new Child();
        $data = $this->validate($request, [
                            'first_name'=>'required', 
                            'last_name'=>'required', 
                            'cps_no'=>'required',
                            'type'=>'required',
                            'caseworker_id'=>'required',
                            'advocate_id'=>'required',
                            'dob'=>'required',
                            'address1'=>'required',
                            'city'=>'required',
                            'zip'=>'required',
                            'county'=>'required'
                            ]);
        $child->first_name = $data['first_name'];
        $child->last_name = $data['last_name'];
        $child->cps_no = $data['cps_no'];
        $child->type = $data['type'];
        $child->caseworker_id = $data['caseworker_id'];
        $child->advocate_id = $data['advocate_id'];
        $child->dob = $data['dob'];
        $child->school_id = $request['school_id'];
        $child->school_id = $request['class'];
        $child->address1 = $data['address1'];
        $child->city = $data['city'];
        $child->zip = $data['zip'];
        $child->county = $data['county'];
        $child->save();
        return redirect('/child/create')
                        ->with('success', 'Child information saved successflly!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
