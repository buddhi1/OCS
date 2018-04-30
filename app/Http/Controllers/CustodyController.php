<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Custody;
use App\Caregiver;
use App\Child;

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
    public function create(Request $request)
    {
        if ($request['child_id']) {
            $child_id = $request['child_id'];
            return view('custody.create')
                        ->with('child_id', $child_id);
        }
        return redirect('child')
                        ->with('error', 'Something went wrong. Please try again');
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
        // dd($request['child_id']);
        if($request['address'] && $request['license_level'] && $request['child_id'])
        {
            $license_level = $request['license_level'];
            $address = $request['address']; 
            $search_name = $request['search_name'];
            $child_id = $request['child_id'];
            
            if ($request['address'] == 1) {
                $address = DB::table('caregivers')
                            ->where('zipcode', 'like', '%'.$search_name.'%')
                            ->where('license_level', '>=', $license_level ) 
                            ->whereRaw('current_children_no < max_fosterchild_no')  
                            ->paginate(10);
            } elseif ($request['address'] == 2) 
            {
                $address = DB::table('caregivers') 
                            ->where('county', 'like', '%'.$search_name.'%')
                            ->where('license_level', '>=', $license_level ) 
                            ->whereRaw('current_children_no < max_fosterchild_no') 
                            ->paginate(10);  
            } 
            
            return view('custody.search_results')
                            ->with('caregiver_results', $address)
                            ->with('child_id', $child_id);

        } else {
            return redirect('child')
                        ->with('error', 'Something went wrong. Please try again');
        }
    }

    //assign a child
    public function assign(Request $request) 
    {
        if($request['caregiver_id'] && $request['child_id']) {
            $caregiver_id = $request['caregiver_id'];
            $child_id = $request['child_id'];
            $custody = new Custody();

            $child = Child::find($child_id);
            $caregiver = Caregiver::find($caregiver_id);
            if ($child->assign_status != 1 && $caregiver->current_children_no < $caregiver->max_fosterchild_no) {
                $custody->child_id = $child_id;
                $custody->caregiver_id = $caregiver_id;
                $caregiver->current_children_no = $caregiver->current_children_no + 1;
                $child->assign_status = 1;
                $caregiver->save();
                $child->save();
                $custody->save();

                return redirect('child')
                                ->with('success', 'Child has been assigned to caregiver successfully!');
            }
            

            return redirect('child')
                            ->with('error', 'Child is already assigned to a care giver');
        } else {
            return redirect('child')
                            ->with('error', 'Something went wrong. Please try again');
        }
    }

    //remove custody
    public function remove(Request $request) {
        if ($request['child_id']) {
            $child_id = $request['child_id'];
            $custody = Custody::where('child_id', '=', $child_id)->first();
            $child = Child::find($child_id);
            $caregiver = Caregiver::find($custody->caregiver_id);
            if ($child->assign_status != 0 && $caregiver) {

                $custody->delete();
                $child->assign_status = 0;
                $caregiver->current_children_no = $caregiver->current_children_no - 1;
                $child->save();
                $caregiver->save();

                return redirect('child')
                            ->with('success', 'Child custody has been removed successfully!');
            }       

            return redirect('child')
                                ->with('error', 'Child is already not in custody');
        } else {
            return redirect('child')
                            ->with('error', 'Something went wrong. Please try again');
        }
    }
}
