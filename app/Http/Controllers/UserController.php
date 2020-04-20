<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $datafor = DB::select('SELECT * FROM users');
        return view('/admin.usermanage',compact('datafor'));
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
        $user = new User();
       
        $user->name= $request->input('name');
        $user->usertype = $request->input('usertype');
        $user->email = $request->input('email');
        $user->password=Hash::make($request->input('password'));
       

           

         

        $user->save();
        return redirect('/admin.usermanage');
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
        $datafor = DB::select('SELECT * FROM users WHERE id=?',[$id]);
        return view('admin.cruduser.edit',compact('datafor'));
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
       
       $name= $request->input('name');
       $usertype = $request->input('usertype');
       $email = $request->input('email');
       $password=Hash::make($request->input('password'));
            DB::update('UPDATE users SET name=?,usertype=?,email=?,password=? WHERE id=?',[$name,$usertype,$email,$password,$id]);
         
        
        

        return redirect('/admin.usermanage');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('DELETE FROM users WHERE id=?',[$id]);
        return redirect('/admin.usermanage');
    }
}
