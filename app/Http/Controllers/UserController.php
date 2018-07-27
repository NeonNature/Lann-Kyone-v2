<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;

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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=$this->validate(request(),[
                'name' => 'required',
                'phone' => 'required',
                'password' => 'required',
                'gender' => 'numeric',
                'organization' => 'required',
                '_token' => 'required',
                'confirmPassword' => 'required|same:password'
            ]);
        $user['password']=Hash::make($user['password']);
        User::create($user);

        //return back()->with('success','Verification mail sent. Check your mail and verify your account.');
        return redirect('mentee/login')->with('status', 'User account created successfully');
    }

    public function login()
    {
        return view('login');
    }

    public function loginAuth(Request $request)
    {
        $phone=$request['phone'];
        $password=$request['password'];

        if(Auth::attempt(["phone" => $phone, "password" => $password]))
        {
            return redirect('/');
        }
        else
        {
            return back()->with('errors','Incorrect phone or password!');
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
        $user=User::find($id);
        return $user;
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
}
