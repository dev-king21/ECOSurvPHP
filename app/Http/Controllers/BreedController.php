<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Breed;
use App\Models\SubBreed;
use App\Models\Park;
use App\Models\Image;
use Illuminate\Support\Facades\Redis;


class BreedController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'Welcome to Dog API';
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
    public function store()
    {
        $response = Http::get('https://dog.ceo/api/breeds/list/all');
        $breedJson = json_encode($response['message']);

        //need a find and delete method - to account for external API deletes

        $redis = Redis::connection();
        $redis->set('breeds', $breedJson);

        $breeds = $response['message'];

            foreach($breeds as $breed => $sub_breeds) {
                $model_breed = Breed::firstOrNew(['breed' => $breed]);
                $model_breed->save();
                if(count($sub_breeds) > 0){
                    $this->addSubBreeds($sub_breeds, $model_breed);
                }
                //Need better way to add images
                $this->addImages($model_breed);
            }

        return $response['message'];

    }

    public function addSubBreeds($sub_breeds, $model_breed)
    {
        foreach($sub_breeds as $sub_breed => $value) {
            $model_sub_breed = SubBreed::firstOrNew(['sub_breed' => $value]);
            $model_breed->sub_breeds()->save($model_sub_breed);
        }
    }

    public function addImages($breed)
    {
        $images = $this->breedImages($breed->breed);
        if(count($images) > 0){
            foreach($images as $image => $value) {
                $model_image = Image::firstOrNew(['url' => $value]);
                $breed->images()->save($model_image);
            }
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
        //
    }

    public function randomBreed()
    {
        $response = Http::get("https://dog.ceo/api/breeds/list/random/1");
        return $response['message'];
    }

    public function breedImages($breed)
    {
        $response = Http::get("https://dog.ceo/api/breed/${breed}/images");
        return $response['message'];
    }

    public function breedImage($breed)
    {
        $response = Http::get("https://dog.ceo/api/breed/${breed}/images/random");
        return $response['message'];
    }

    public function parks(Request $request, $id)
    {
        $park = Park::findOrFail($id);
        $breed = Breed::findOrFail($request->breed);
        $park->breeds()->attach($breed->id);
        return "park: $park->name breed: $breed->breed";

    }

    public function breedData($breed)
    {
        $modelBreed = Breed::where('breed', $breed)->firstOrFail();
        $breedData = ['Breed' => $modelBreed->breed];

        foreach ($modelBreed->users as $user) {
            $breedData[] = [
                'User' => $user->name
            ];
        }

        foreach ($modelBreed->parks as $park) {
            $breedData[] = [
                'Park' => $park->name
            ];
        }

        return $breedData;

    }

}
