<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return Auth::user();
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
        $user = User::create($request->all());
        $user->password = bcrypt($request->password);
        $path = public_path().'/storage/img/';
        $OriginalImage = $request->file('image');
        $image = Image::make($OriginalImage);
        $temp_name = $user->id . '.' . $OriginalImage->getClientOriginalExtension();
        $image->resize(300,300);
        $image->save($path . $temp_name, 100);
        $user->image=$temp_name;
        $user->save();

        return $user;
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
    public function update(Request $request)
    {
        $user= Auth::user();

        $user->fill($request->all());
        /*
         Storage::delete($user->image);
        $path = public_path().'/storage/img/';
        $OriginalImage = $request->file('image');
        $image = Image::make($OriginalImage);
        $temp_name = $user->id . '.' . $OriginalImage->getClientOriginalExtension();
        $image->resize(300,300);
        $image->save($path . $temp_name, 100);
        $user->image=$temp_name;*/
        $user->save();
        return $user;
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
