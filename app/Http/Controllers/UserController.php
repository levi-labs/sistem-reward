<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Daftar Users';
        $users = User::all();

        return view('pages.user.index', ['title' => $title, 'users' => $users]);
    }

    public function resetPass($id){

        $user = User::where('id', $id)->first();
        $user->password = bcrypt($user->username);
        $user->update();

        return back()->with('success', 'User Password Berhasil direset...!');
    }

    public function changePassword(){
        $title = 'Form Change Password';

        return view('pages.auth.password', ['title' => $title]);
    }

    public function updatePassword(Request $request, $id){
        
        $this->validate($request, [
            'old_password'  => 'required',
            'password'      => ['required', 'confirmed']
        ]);

        $oldpasswordDB = auth()->user()->password;
        $inputOldPass = $request->old_password;

        if (Hash::check($inputOldPass, $oldpasswordDB)) {
            $user = User::where('id', $id)->first();
            $user->password = bcrypt($request->password);
            $user->save();

            return back()->with('success' , 'Password Berhasil diubah...!');
        }else{
             return back()->withErrors(['old_password' => 'Password Lama Anda Salah..!']);
        }

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Form Tambah User';
        
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
        $user = User::where('id', $id)->first();
        $user->delete();

        return back()->with('success', 'User Berhasil dihapus...!');
    }
}
