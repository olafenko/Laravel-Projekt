<?php

namespace App\Services;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ListingService
{

    public function getAllListings(Request $request) : Collection{

        $listingsQuery = Listing::where("is_active","=",true);

        $searchFragment = $request->input("searchFragment");
        $categoryId = $request->input("category_id");
        $priceSort = $request->input("priceSort");
        $publishDate = $request->input("publishDate");
        $city = $request->input("location");

        if($searchFragment){
            $listingsQuery->where("title","ILIKE","%".$searchFragment."%");
        }

        if($categoryId){
            $listingsQuery->where("category_id","=",$categoryId);
        }

        if($priceSort){
            $listingsQuery->orderBy("price",$priceSort);
        }

        if($publishDate){
            $listingsQuery->orderBy("created_at",$publishDate);
        }

        if($city){
            $listingsQuery->where("location",$city);
        }

        return $listingsQuery->get();
    }

    public function getListingById($id) {
        return Listing::find($id);
    }

    public function createListing(Request $request) : void {

        $request->validate([
            "title" => ["required","min:3","max:100"],
            "price" => ["required","min:0.01"],
            "description" => ["max:200"],
            "location" => ["required","min:2","max:60"],
            "category_id" => ["required","exists:categories,id"],
            "photo_url" => ["nullable","image"],
        ]);

        $model = new Listing();

        $model->title = $request->input("title");
        $model->price = $request->input("price");
        $model->description = $request->input("description");
        $model->location = $request->input("location");
        $model->category_id = $request->input("category_id");
        $model->is_active = true;
        $model->author_id = auth()->id();
        $model->created_at = Date("Y-m-d H:i:s");

        if($request->hasFile("photo_url")){
            $model->photo_url = $request->file("photo_url")->store("uploads","public");
        }

        $model->save();
    }

    public function editListing(Request $request,$id) : void{

        $request->validate([
            "title" => ["required","min:3","max:100"],
            "price" => ["required","min:0.01"],
            "description" => ["max:200"],
            "location" => ["required","min:2","max:60"],
            "category_id" => ["required","exists:categories,id"],
            "photo_url" => ["nullable","image"],
        ]);


        $model = Listing::findOrFail($id);

        Gate::authorize('update',$model);

        $model->title = $request->input("title");
        $model->price = $request->input("price");
        $model->description = $request->input("description");
        $model->location = $request->input("location");
        $model->category_id = $request->input("category_id");
        $model->updated_at = Date("Y-m-d H:i:s");


        if($request->hasFile("photo_url")) {

            if ($model->photo_url) {
                Storage::disk("public")->delete($model->photo_url);
            }

            $model->photo_url = $request->file("photo_url")->store("uploads", "public");
        }

        $model->save();
    }



    public function delete($id): void
    {

        $model = Listing::findOrFail($id);

        Gate::authorize('update',$model);

        $model->is_active = false;

        $model->save();
    }


}
