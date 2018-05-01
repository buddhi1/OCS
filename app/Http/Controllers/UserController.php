<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index')
                    ->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Return users view
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();

        $data = $this->validate($request, [  'name'=>'required',                                            
                                             'email'=>'bail|required|unique:users,email',
                                             'password'=>'required|min:6',
                                             'confirm_password'=>'required'
                                            ]);

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->type = 1;
        $user->password = bcrypt($data['password']);
        $user->save();
        return redirect('/user') -> with('success', 'User added successfully');
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
            $user = DB::table('users')->select('id', 'email')->where('id', $id)->first();
            if ($user) {
                return view('user.edit')
                        ->with('user', $user);
            } else {
                return redirect('/user')
                        ->with('error', 'User information not found. Try again');
            }
        } else {
            return redirect('/user')
                    ->with('error', 'Invalid user information. Try again');
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
            $user = User::find($id);
            if ($user) {
                if ($request['new_password'] != "" && $request['confirm_password'] != "" ) {
                    if ($request['new_password'] == $request['confirm_password']) {
                        $user->password = bcrypt($request['new_password']);
                        $user->save();
                        return redirect('/user')
                                ->with('success', 'Password updated successfully!!!');
                    } else {
                        return redirect('/user')
                                        ->with('error', 'Password verification failed. Try again');
                    }
                } else {
                    return redirect('/user');
                }            
            
            } else {
                return redirect('/user')
                        ->with('error', 'Invalid user information. Try again');
            } 
        } else {
            return redirect('/user')
                    ->with('error', 'Invalid user information. Try again');
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
            $user = User::find($id);
            if ($user) {
                $caregiver = DB::table('caregivers')->where('user_id', '=', $id)->first();
                if ($caregiver) {
                    return redirect('/user')
                        ->with('error', 'This is a Care Giver account. Use care givers tab to delete account');
                }
                $user->delete();
                return redirect('/user')
                        ->with('success', 'User information deleted successfully');
            } else {
                return redirect('/user')
                        ->with('error', 'User information not found. Try again');
            }
        } else {
            return redirect('/user')
                    ->with('error', 'Invalid user information. Try again');
        }
    }
}
