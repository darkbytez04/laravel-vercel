<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{   


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


public function index()
{
    $users = User::paginate(5);

    return view('users.index', ['users'=> $users]);
}

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $users = new User;
     $users->name = $request->name;
     $users->email = $request->email;
     $users->password = md5($request->name);
     $users->is_admin = $request->is_admin;
     $users->save();

     if ($users) {
         return redirect()->back()->with('User Created Successfully!');
             } 
             return redirect()->back()->with('User Fail Created Successfully!');
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $users = User::find($id);
            if (!$users) {
                return back()->with('Error','User Not Found!');
            }
            $users->update($request->all());
            return back()->with('Success','User Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('Success','User Deleted Successfully!');
    }
}
