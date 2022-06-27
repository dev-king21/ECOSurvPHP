<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Park;
use App\Models\Breed;

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        if($request->type === 'park') {
            $user = User::findOrFail($id);
            $park = Park::findOrFail($request->value);
            $user->parks()->attach($park->id);
            return "user: $user->name park: $park->name";
        }else if($request->type === 'breed'){
            $user = User::findOrFail($id);
            $breed = Breed::findOrFail($request->value);
            $user->breeds()->attach($breed->id);
            return "user: $user->name breed: $breed->breed";
        }else {
            return 'Sorry, incorrect type specified.';
        };
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
