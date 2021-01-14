<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', ['users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', [
            'roles' => $roles, 
            'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->nickname = $request->nickname;
        $user->credit = $request->credit;
        $user->email = $request->email;
        
        if ($request->hasFile('imgPath')){
            $file = $request->file('imgPath');
            
            // if(file_exists(public_path($user->imgPath) == true && $user->imgPath != '/images/users/profileDefault.png')){
            //     unlink(public_path($user->imgPath));
            // }
            // Storage::delete('public' . $user->imgPath);
            // FacadesFile::delete('public' .  $user->imgPath);
            $user->imgPath = '/images/users/' . $file->getClientOriginalName();
            $file->move(public_path('\images\users/'), $file->getClientOriginalName());
        }else{
            $user->imgPath = '/images/users/profileDefault.png';
        }
        
        $user->save();

        return redirect(route('admin.users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->roles()->detach();
        $user->delete();

        return redirect(route('admin.users.index'));
    }
}
