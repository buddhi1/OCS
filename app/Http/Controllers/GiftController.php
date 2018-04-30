<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gift;

class GiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        // dd($request->session()->get('child_id'));     
        if ($request || $request->session()->get('child_id')) {
            if ($request['child_id']) {
                $child_id = $request['child_id'];
            } else {
                $child_id = $request->session()->get('child_id');
            }
            

            $child = DB::table('children')
                        ->where('id', '=', $child_id)
                        ->first();

            if ($child) {
                $gifts = DB::table('gifts')
                            ->where('child_id', '=', $child->id)
                            ->get();
                return view('gift.index')
                        ->with('gifts', $gifts)
                        ->with('child_id', $child->id);
            } else {
                return redirect('/child')
                        ->with('error', 'Something went wrong. Please try again');
            }
        } else {
            return redirect('/child')
                    ->with('error', 'Something went wrong. Please try again');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request) {
           $gift = new Gift();
            $data = $this->validate($request, [
                    'child_id'=>'required',
                    'item'=>'required',
                    'type'=>'required'
                ]);
            if ($request['child_id']) {
                $child_id = $request['child_id'];
            } else {
                $child_id = $request->session()->get('child_id');
            }
            $child = DB::table('children')->where('id', '=', $child_id)->first();
            if ($child) {
                $gift->child_id = $data['child_id'];
                $gift->item = $data['item'];
                $gift->type = $data['type'];
                $gift->save();
               
                return redirect('/child/gift')
                        ->with('success', 'New item added successfully!')
                        ->with('child_id', $child->id);
            } else {
                return redirect('/child/gift')
                        ->with('error', 'Something went wrong. Please try again');
            }
            
        } else {
            return redirect('/child/gift')
                    ->with('error', 'Something went wrong. Please try again');
        }
        
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
            $gift = DB::table('gifts')->where('id', $id)->first();
            if ($gift) {
                return view('gift.edit')
                        ->with('gift', $gift);
            } else {
                return redirect('/child/gift')
                        ->with('error', 'Information not found. Try again');
            }
        } else {
            return redirect('/child/gift')
                    ->with('error', 'Invalid information. Try again');
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
            $gift = Gift::find($id);
            if ($gift) {
                $data = $this->validate($request, [
                                        'child_id'=>'required',
                                        'item'=>'required',
                                        'type'=>'required'    
                                        ]);
                $child = DB::table('children')->where('id', '=', $data['child_id'])->first();
                if ($child) {
                    $gift->item = $data['item'];
                    $gift->type = $data['type'];
                    $gift->save();

                    return redirect('/child/gift')
                                ->with('success', 'Information updated successfully!!!')
                                ->with('child_id', $child->id);
                } else {
                    return redirect('/child/gift')
                            ->with('error', 'Something went wrong. Please try again');
                }
            } else {
                return redirect('/child/gift')
                        ->with('error', 'Information not found. Try again');
            }
        } else {
            return redirect('/child/gift')
                    ->with('error', 'Invalid information. Try again');
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
            $gift = Gift::find($id);
            if ($gift) {
                $gift->delete();

                return redirect('/child/gift')
                        ->with('success', 'Item deleted successfully')
                        ->with('child_id', $gift->child_id);
            } else {
                return redirect('/child/gift')
                        ->with('error', 'Item not found. Try again');
            }
        } else {
            return redirect('/child/gift')
                    ->with('error', 'Invalid information. Try again');
        }
    }

    //returns the CRUD view
    public function indexView(Request $request) {
        
    }
}
