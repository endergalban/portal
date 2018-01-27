<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display the template.
     *
     * @return \Illuminate\Http\Response

     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get(Request $request)
    {
        //
        $users = User::paginate();
        return $users->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->id == 0) {
            $user = new User;
        } else {
            $user = User::findOrFail($request->id);
        }
        $user->fill($request->all());
        $user->save();
        $users = User::paginate();
        return $users->toJson();

    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->delete();
        $users = User::paginate();
        return $users->toJson();
    }
}
