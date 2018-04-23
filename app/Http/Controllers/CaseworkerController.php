<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Caseworker;

class CaseworkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $caseworker = DB::table('caseworkers')->get();
        return view('caseworker.index')
                    ->with('caseworkers', $caseworker);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return caseWorker commnet
        return view('caseworker.create');
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
        $caseworker = new Caseworker();
        $data = $this->validate($request, [
                            'first_name'=>'required', 
                            'last_name'=>'required',
                            'email'=>'required',                            
                            'phone'=>'bail|required|max:10',
                            'address'=>'required',
                            'zip_code'=>'required',
                            'country'=>'required'
                                ]);
        $caseworker->first_name = $data['first_name'];
        $caseworker->last_name = $data['last_name'];
        $caseworker->email = $data['email'];
        $caseworker->phone = $data['phone'];
        $caseworker->address = $data['address'];
        $caseworker->zip_code = $data['zip_code'];
        $caseworker->country = $data['country'];
        $caseworker->save();
        return redirect ('/caseworker/create')
                         ->with('success','case worker information saved successfully');

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
            $caseworker = DB::table('caseworkers')->where('id', $id)->first();
            if ($caseworker) {
                return view('caseworker.edit')
                        ->with('caseworker', $caseworker);
            } else {
                return redirect('/caseworker')
                        ->with('error', 'Child information not found. Try again');
            }
        } else {
            return redirect('/caseworker')
                    ->with('error', 'Invalid child information. Try again');
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
            $caseworker = Caseworker::find($id);
            if ($caseworker) {
        $data = $this->validate($request, [
                            'first_name'=>'required', 
                            'last_name'=>'required',
                            'email'=>'required',                            
                            'phone'=>'bail|required|max:10',
                            'address'=>'required',
                            'zip_code'=>'required',
                            'country'=>'required'
                                ]);
        $caseworker->first_name = $data['first_name'];
        $caseworker->last_name = $data['last_name'];
        $caseworker->email = $data['email'];
        $caseworker->phone = $data['phone'];
        $caseworker->address = $data['address'];
        $caseworker->zip_code = $data['zip_code'];
        $caseworker->country = $data['country'];
        $caseworker->save();
                return redirect('/caseworker')
                                ->with('success', 'Case worker information updated successfully!!!');
            } else {
                return redirect('/caseworker')
                        ->with('error', 'case worker information not found. Try again');
            }
        } else {
            return redirect('/caseworker')
                    ->with('error', 'Invalid case worker information. Try again');
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
            $caseworker = Caseworker::find($id);
            if ($caseworker) {
                $caseworker->delete();

                return redirect('/caseworker')
                        ->with('success', 'Case worker information deleted successfully');
            } else {
                return redirect('/caseworker')
                        ->with('error', 'Case worker information not found. Try again');
            }
        } else {
            return redirect('/caseworker')
                    ->with('error', 'Invalid case worker information. Try again');
        }
        
    }
}
