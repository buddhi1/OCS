<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Advocate;

class AdvocateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $advocates = DB::table('advocates')->get();
        return view('advocate.index')
                    ->with('advocates', $advocates);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return caseWorker commnet
        return view('advocate.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $advocate = new Advocate();
        $data = $this->validate($request, [
                            'first_name'=>'required',
                            'last_name'=>'required',
                            'email'=>'required',
                            'phone'=>'bail|required|max:10',
                            'address'=>'required',
                            'zip_code'=>'required',
                            'country'=>'required'
                                ]);
        $advocate->first_name = $data['first_name'];
        $advocate->last_name = $data['last_name'];
        $advocate->email = $data['email'];
        $advocate->phone = $data['phone'];
        $advocate->address = $data['address'];
        $advocate->zip_code = $data['zip_code'];
        $advocate->country = $data['country'];
        $advocate->save();
        return redirect ('/advocate/create')
                         ->with('success','Advocate information saved successfully');

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
        if($id) {
            $advocate = DB::table('advocates')->where('id', $id)->first();
            if ($advocate) {
                return view('advocate.edit')
                        ->with('advocate', $advocate);
            } else {
                return redirect('/advocate')
                        ->with('error', 'Advocate information not found. Try again');
            }
        } else {
            return redirect('/advocate')
                    ->with('error', 'Invalid advocate information. Try again');
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
            $advocate = Advocate::find($id);
            if ($advocate) {
        $data = $this->validate($request, [
                            'first_name'=>'required',
                            'last_name'=>'required',
                            'email'=>'required',
                            'phone'=>'bail|required|max:10',
                            'address'=>'required',
                            'zip_code'=>'required',
                            'country'=>'required'
                                ]);
        $advocate->first_name = $data['first_name'];
        $advocate->last_name = $data['last_name'];
        $advocate->email = $data['email'];
        $advocate->phone = $data['phone'];
        $advocate->address = $data['address'];
        $advocate->zip_code = $data['zip_code'];
        $advocate->country = $data['country'];
        $advocate->save();
                return redirect('/advocate')
                                ->with('success', 'Advocate information updated successfully!!!');
            } else {
                return redirect('/advocate')
                        ->with('error', 'Advocate information not found. Try again');
            }
        } else {
            return redirect('/advocate')
                    ->with('error', 'Invalid advocate information. Try again');
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
            $advocate = Advocate::find($id);
            if ($advocate) {
                $advocate->delete();

                return redirect('/advocate')
                        ->with('success', 'Advocate information deleted successfully');
            } else {
                return redirect('/advocate')
                        ->with('error', 'Advocate information not found. Try again');
            }
        } else {
            return redirect('/advocate')
                    ->with('error', 'Invalid advocate information. Try again');
        }

    }

    //retruns all names of the caseworkers
    public function all(Request $request)
    {
        if ($request) {
            $name = $request['name'];
            $advocates = DB::table('advocates')
                        ->select('id', 'first_name', 'last_name')
                        ->where('last_name', 'like', $name.'%')
                        // ->where('first_name', 'like', $name.'%')
                        ->get();
            return json_encode($advocates);
        }

    }
}
