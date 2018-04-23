<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Agency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $agency = DB::table('agencies')->get();
        return view('agency.index')
                    ->with('agencies', $agency);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return agency commnet
         return view('agency.create');
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
        $agency = new Agency();
        $data = $this->validate($request, [
                            'first_name'=>'required', 
                            'last_name'=>'required',
                            'email'=>'required',                            
                            'phone'=>'bail|required|max:10',
                            'address'=>'required',
                            'zip_code'=>'required',
                            'country'=>'required'
                                ]);
        $agency->first_name = $data['first_name'];
        $agency->last_name = $data['last_name'];
        $agency->email = $data['email'];
        $agency->phone = $data['phone'];
        $agency->address = $data['address'];
        $agency->zip_code = $data['zip_code'];
        $agency->country = $data['country'];
        $agency->save();
        return redirect ('/agency/create')
                         ->with('success','agency information saved successfully');
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
            $agency = DB::table('agencies')->where('id', $id)->first();
            if ($agency) {
                return view('agency.edit')
                        ->with('agency', $agency);
            } else {
                return redirect('/agency')
                        ->with('error', 'Agency information not found. Try again');
            }
        } else {
            return redirect('/agency')
                    ->with('error', 'Invalid agency information. Try again');
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
            $agency = Agency::find($id);
            if ($agency) {
                $data = $this->validate($request, [
                                    'first_name'=>'required', 
                                    'last_name'=>'required',
                                    'email'=>'required',                            
                                    'phone'=>'bail|required|max:10',
                                    'address'=>'required',
                                    'zip_code'=>'required',
                                    'country'=>'required'
                                        ]);
                $agency->first_name = $data['first_name'];
                $agency->last_name = $data['last_name'];
                $agency->email = $data['email'];
                $agency->phone = $data['phone'];
                $agency->address = $data['address'];
                $agency->zip_code = $data['zip_code'];
                $agency->country = $data['country'];
                $agency->save();
                return redirect('/agency')
                                ->with('success', 'agency information updated successfully!!!');
            } else {
                return redirect('/agency')
                        ->with('error', 'agency information not found. Try again');
            }
        } else {
            return redirect('/agency')
                    ->with('error', 'Invalid agency information. Try again');
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
       //
        if ($id) {
            $agency = Agency::find($id);
            if ($agency) {
                $agency->delete();

                return redirect('/agency')
                        ->with('success', 'Case worker information deleted successfully');
            } else {
                return redirect('/agency')
                        ->with('error', 'Agency information not found. Try again');
            }
        } else {
            return redirect('/agency')
                    ->with('error', 'Invalid agency information. Try again');
        }
    }
}
