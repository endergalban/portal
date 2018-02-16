<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Atributo;
use Validator;

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
        $regiones = Atributo::where('entidad_id',1)->get();
        return view('admin.users.index')->with(compact('regiones'));
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
            $userEmail = User::where('email',$request->email)->first();
            if ($userEmail) {
                return -2;
            }
            $userRut = User::where('rut',$request->rut)->first();
            if ($userRut) {
                 return -1;
            }

            $user = new User;

        } else {
            $userEmail = User::where('id','<>',$request->id)->where('email',$request->email)->first();
            if ($userEmail) {
                return -2;
            }
            $userRut = User::where('id','<>',$request->id)->where('rut',$request->rut)->first();
            if ($userRut) {
                 return -1;
            }
            $user = User::findOrFail($request->id);
        }
        $user->fill($request->all());
        $user->save();
        $users = User::paginate();
        return $users->toJson();

    }

    public function edit(Request $request, $id) {
        $user = User::findOrFail($id);       
        return view('auth.edit', compact('user'));
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

        $user = User::find($id);
        Validator::make($request->all(), [
          'name' => 'required|max:255',
          'rut' => 'required',
          'email' => 'required|email|unique:users,email,'.$user->id,
          'password' => 'required|confirmed'
        ])->validate();

        $user->name = $request->get('name');
        $user->rut = $request->get('rut');
        $user->email = $request->get('email');
        $user->password = $request->get('password');
        $user->save();

        return redirect()->back()->
        with('success','Product has been updated');
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
