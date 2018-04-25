<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\School;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = DB::table('schools')->paginate(10);
        return view('school.index')
                    ->with('schools', $schools);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('school.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $school = new School();
        $data = $this->validate($request, [
                                'name'=>'bail|required|unique:schools,name',
                                'district'=>'required'    
                                ]);
        $school->name = $data['name'];
        $school->district = $data['district'];
        $school->save();

        return redirect('/school/create')
                        ->with('success', 'New School added successfully!');
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
        if($id) {
            $school = DB::table('schools')->where('id', $id)->first();
            if ($school) {
                return view('school.edit')
                        ->with('school', $school);
            } else {
                return redirect('/school')
                        ->with('error', 'School information not found. Try again');
            }
        } else {
            return redirect('/school')
                    ->with('error', 'Invalid school information. Try again');
        }
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
        if ($id) {
            $school = School::find($id);
            if ($school) {
                $data = $this->validate($request, [
                                        'name'=>'bail|required|unique:schools,name',
                                        'district'=>'required'    
                                        ]);
                $school->name = $data['name'];
                $school->district = $data['district'];
                $school->save();

                return redirect('/school')
                                ->with('success', 'Child information updated successfully!!!');
            } else {
                return redirect('/school')
                        ->with('error', 'Child information not found. Try again');
            }
        } else {
            return redirect('/school')
                    ->with('error', 'Invalid child information. Try again');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id) {
            $school = School::find($id);
            if ($school) {
                $school->delete();

                return redirect('/school')
                        ->with('success', 'School information deleted successfully');
            } else {
                return redirect('/school')
                        ->with('error', 'School information not found. Try again');
            }
        } else {
            return redirect('/school')
                    ->with('error', 'Invalid school information. Try again');
        }
    }

    //retruns all names of the schools
    public function all(Request $request) 
    {
        if ($request) {
            $name = $request['name'];
            $schools = DB::table('schools')
                        ->select('id', 'name')
                        ->where('name', 'like', $name.'%')
                        ->get();        
            return json_encode($schools);
        }
        
    }
}
