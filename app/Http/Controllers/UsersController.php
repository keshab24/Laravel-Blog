<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('admin');
    }
    public function index()
    {
        return view('admin.user.index')->with('users',User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
        'name'=>'required',
        'email'=>'required|email'
        ]);
        $user=new User;
        $user->name=$request->name;
        $user->email=$request->email;
        if($request->has('password')){
            $user->password=bcrypt($request->password);
            $user->save();
        }
        $user->save();
        /*$user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            if($request->has('password')){
                $user->password=bcrypt($request->password);
                $user->save();
            }
            //'password'=>bcrypt('password')*/
        
        $profile=Profile::create([
            'user_id'=>$user->id,
            'avatar'=>'uploads/avatars/man.png'
        ]);
        Session::flash('success','User Created Successfully');
        return redirect()->route('users');
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
        $user=User::find($id);
        $user->profile->delete();
        $user->delete();
        Session::flash('success','User deleted successfully.');
        return redirect()->back();
    }
    public function admin($id){
      $user=User::find($id);
      $user->admin = 1;
      Session::flash('success','Successfully Changed user permission');
      $user->save();
     
      return redirect()->back();
    }
    public function not_admin($id){
        $user=User::find($id);
        $user->admin = 0;
        Session::flash('success','Successfully Changed user permission');
        $user->save();
       
        return redirect()->back();
      }
}
