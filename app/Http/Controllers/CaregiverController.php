<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Caregiver;
use App\User;

class CaregiverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $caregivers = DB::table('caregivers')->paginate(10);
        return view('caregiver.index')->with('caregivers', $caregivers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Return Caregiver form
        return view('caregiver.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $caregiver = new Caregiver();
        $user = new User();
        
        $data2 = $this->validate($request, ['email'=>'bail|required|unique:users,email',
                                            'password'=>'required|min:8'
                                            ]);
        $data = $this->validate($request, [  'first_name'=>'required',
                                             'last_name'=>'required',
                                             'address'=>'required',
                                             'county'=>'required',
                                             'city'=>'required', 
                                             'zipcode'=>'required', 
                                             'cpa'=>'required',
                                             'caseworker_name'=>'required',
                                             'license_type'=>'required',
                                             'license_no'=>'required',
                                             'license_level'=>'required',
                                             'max_fosterchild_no'=>'required',
                                             'respite'=>'required',
                                             'bio_children_no'=>'required',
                                             'kinship_children_no'=>'required',
                                             'foster_children_no'=>'required'
                                            ]);

        $user->email = $data2['email'];
        $user->password = App\Hash::make($data2['password']);
        $user->name = $data['first_name'];
        

        if($user->save()) {
            $caregiver->user_id = $user->id;
            $caregiver->first_name = $data['first_name'];
            $caregiver->last_name = $data['last_name'];
            $caregiver->address = $data['address'];
            $caregiver->county = $data['county'];        
            $caregiver->city = $data['city'];
            $caregiver->zipcode = $data['zipcode'];
            $caregiver->cpa = $data['cpa'];
            $caregiver->caseworker_name = $data['caseworker_name'];
            $caregiver->license_type = $data['license_type'];
            $caregiver->license_no = $data['license_no'];
            $caregiver->license_level = $data['license_level'];
            $caregiver->max_fosterchild_no = $data['max_fosterchild_no'];
            $caregiver->respite = $data['respite'];
            $caregiver->bio_children_no = $data['bio_children_no'];
            $caregiver->kinship_children_no = $data['kinship_children_no'];
            $caregiver->foster_children_no = $data['foster_children_no'];
            $caregiver->save();


            return redirect('/caregiver/create')->with('success', 'Caregiver information saved successfully!');
        } else {
            return redirect('/caregiver/create')->with('error', 'Something went wrong. Infromation not saved');
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $caregiver = DB::table('caregivers')->where('id', $id)->first();
        if($id) {
            $school = DB::table('schools')->where('id', $id)->first();

            if($caregiver){
                return view('caregiver.edit')
                            ->with('caregiver', $caregiver);
            } else {
                return redirect('/caregiver')
                           ->with('error', 'Caregiver information not found. Try again');
            }
        } else {
                return redirect('/caregiver')
                        ->with('error', 'Invalid caregiver information. Try again');
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
            $caregiver = Caregiver::find($id);
            if ($caregiver) {
                    $data = $this->validate($request, [  'first_name'=>'required',
                                             'last_name'=>'required',
                                             'address'=>'required',
                                             'county'=>'required',
                                             'city'=>'required', 
                                             'zipcode'=>'required', 
                                             'cpa'=>'required',
                                             'caseworker_name'=>'required',
                                             'license_type'=>'required',
                                             'license_no'=>'required',
                                             'license_level'=>'required',
                                             'max_fosterchild_no'=>'required',
                                             'respite'=>'required',
                                             'bio_children_no'=>'required',
                                             'kinship_children_no'=>'required',
                                             'foster_children_no'=>'required'
                                            ]);

                    $caregiver->first_name = $data['first_name'];
                    $caregiver->last_name = $data['last_name'];
                    $caregiver->address = $data['address'];
                    $caregiver->county = $data['county'];        
                    $caregiver->city = $data['city'];
                    $caregiver->zipcode = $data['zipcode'];
                    $caregiver->cpa = $data['cpa'];
                    $caregiver->caseworker_name = $data['caseworker_name'];
                    $caregiver->license_type = $data['license_type'];
                    $caregiver->license_no = $data['license_no'];
                    $caregiver->license_level = $data['license_level'];
                    $caregiver->max_fosterchild_no = $data['max_fosterchild_no'];
                    $caregiver->respite = $data['respite'];
                    $caregiver->bio_children_no = $data['bio_children_no'];
                    $caregiver->kinship_children_no = $data['kinship_children_no'];
                    $caregiver->foster_children_no = $data['foster_children_no'];
                    $caregiver->save();

                    return redirect('/caregiver')
                                    ->with('success', 'Caregiver information updated successfully!!!');
            } else {
                return redirect('/caregiver')
                        ->with('error', 'Caregiver information not found. Try again');
            }
        } else {
            return redirect('/caregiver')
                    ->with('error', 'Invalid caregiver information. Try again');
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
        if($id){
            $caregiver = Caregiver::find($id);
            if ($caregiver) {
                $caregiver->delete();
                return redirect('/caregiver')
                        ->with('success', 'Caregiver information deleted successfully');
            } else {
                return redirect('/caregiver')
                        ->with('error', 'Caregiver information not found. Try again');
            }
        } else {
            return redirect('/caregiver')
                    ->with('error', 'Invalid caregiver information. Try again');
        }
    }
}
