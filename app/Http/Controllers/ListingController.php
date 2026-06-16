<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\ListingService;
use Illuminate\Http\Request;

class ListingController extends Controller
{

    private ListingService $listingService;
    private CategoryService $categoryService;

    public function __construct(ListingService $listingService, CategoryService $categoryService)
    {
        $this->listingService = $listingService;
        $this->categoryService = $categoryService;
    }


    public function index(Request $request)
    {
        $models = $this->listingService->getAllListings($request);

        return view("listing.index",["models" => $models,"listingsCount" => $models->count(),"page_title" => "Wszystkie ogłoszenia"]);
    }

    public function listingDetails($id){
        $model = $this->listingService->getListingById($id);
        return view("listing.details",["model" => $model]);
    }

    public function listingForm(?int $id = null)
    {
        $categories = $this->categoryService->getAllCategories();
        $listing = $this->listingService->getListingById($id);
        return view("listing.form",["categories" => $categories,"page_title" => $listing == null ? "Dodaj ogłoszenie" : "Edytuj ogłoszenie","model" => $listing]);
    }

    public function create(Request $request)
    {
        $this->listingService->createListing($request);

        return redirect("/listings")->with("success","Ogłoszenie dodane pomyślnie.");
    }

    public function edit(Request $request,$id)
    {
        $this->listingService->editListing($request,$id);

        return redirect("/listings")->with("success","Ogłoszenie edytowane pomyślnie.");
    }

    public function delete($id){

        $this->listingService->delete($id);
        return redirect("/listings")->with('success',"Ogłoszenie usunięte pomyślnie.");
    }



}
