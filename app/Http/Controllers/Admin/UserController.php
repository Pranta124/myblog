<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $roles = Role::all();
        $users = User::all();
        return view('admin.users.index',compact('users','roles'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        
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
        //dd($request);
        $user = User::findOrFail($id);
        if(Auth::user()->id == $id)
        {
            Toastr::warning('Warning', 'Admin can not changed role themselves::');
            return redirect()->back();
        }
        $user->role_id = $request->role;
        $user->save();
        Toastr::success('Success', 'Role changed Successfully :)');
        return redirect()->back();
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if(Auth::user()->id == $id)
        {
            Toastr::warning('Admin cannot be deleted themselves');
            return redirect()->back();
        }
        if($user->image !== 'default.jpg' && Storage::disk('public')->exists('user/' . $user->image))
        {
            Storage::disk('public')->delete('user/' . $user->image);
        }
        $user->delete();
        Toastr::success('User successfully deleted :)');
        return redirect()->back();
    }
}
