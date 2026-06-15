<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\ListingService;
use Illuminate\Http\Request;

class ListingController extends Controller
{

    private ListingService $listingService;
    private CategoryService $categoryService;

    /**
     * @param ListingService $listingService
     * @param CategoryService $categoryService
     */
    public function __construct(ListingService $listingService, CategoryService $categoryService)
    {
        $this->listingService = $listingService;
        $this->categoryService = $categoryService;
    }


    public function index()
    {
        $models = $this->listingService->getAllListings();

        return view("listing.index",["models" => $models,"listingsCount" => $models->count(),"page_title" => "Wszystkie ogłoszenia"]);
    }

    public function createView()
    {
        $categories = $this->categoryService->getAllCategories();
        return view("listing.create",["categories" => $categories,"page_title" => "Dodaj ogłoszenie"]);
    }

    public function create(Request $request)
    {
        $this->listingService->createListing($request);

        return redirect("/listings")->with("success","Ogłoszenie dodane pomyślnie.");
    }

    public function delete($id){

        $this->listingService->delete($id);
        return redirect("/listings")->with('success',"Ogłoszenie usunięte pomyślnie.");
    }



}
