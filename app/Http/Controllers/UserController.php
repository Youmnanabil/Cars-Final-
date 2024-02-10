<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Session;
use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Passport\HasApiTokens;
use App\Models\Message;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $message = Message::paginate(6);
        $user = User::paginate(6);
        return view('admin.users', compact('user', 'message'));
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $message = Message::paginate(6);
        return view('admin.adduser',  compact('message'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|string',
            'username'=>'required|string',
            'email'=>'required',
            'password'=>'required',
        ]);
        $data['password']= Hash::make($request->password);
        session()->put('username', $data['name'] = $request->name);
        User::create($data)->markEmailAsVerified();
        return redirect('user'); 
       
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $message = Message::paginate(6);
        $user= User::findOrFail($id);
        return view('admin.updateuser', compact('user', 'message'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data= $request->validate([
            'name'=>'required|string',
            'username'=>'required|string',
            'email'=>'required',
            'password'=>'required',
        ]);
        $data['password']= Hash::make($request->password);
        $data['active'] = isset($request->active);
        User::where('id', $id)->update($data);
        return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
