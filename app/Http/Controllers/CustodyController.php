<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Custody;

class CustodyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(caregiver_results);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('custody.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    // Returns the elements in custody table
    public function search(Request $request)
    {
        if($request['address'] && $request['license_level'])
        {
            $license_level = $request['license_level'];
            $address = $request['address']; 
            $search_name = $request['search_name'];
            
            if ($request['address'] == 1) {
                $address = DB::table('caregivers')
                            ->where('zipcode', '=', $search_name)
                            ->where('license_level', '<=', $license_level ) 
                            ->where('current_children_no', '<', 'max_fosterchild_no')  
                            ->paginate(10);
            } elseif ($request['address'] == 2) 
            {
                $address = DB::table('caregivers') 
                            ->where('county', '=', $search_name)
                            ->where('license_level', '<=', $license_level ) 
                            ->where('current_children_no', '<', 'max_fosterchild_no') 
                            ->paginate(10);  
            } 
            
            return view('custody.search_results')
                            ->with('caregiver_results', $address);

        }
    }
}
