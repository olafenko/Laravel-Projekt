<?php

namespace App\Http\Controllers;

use App\Services\ListingService;
use Illuminate\Http\Request;

class ListingController extends Controller
{

    private ListingService $listingService;

    public function __construct(ListingService $listingService)
    {
        $this->listingService = $listingService;
    }

    public function index()
    {
        $models = $this->listingService->getAllListings();

        return view("listing.index",["models" => $models, "page_title" => "Wszystkie ogłoszenia"]);
    }

    public function createView()
    {
        return view("listing.create",["page_title" => "Dodaj ogłoszenie"]);
    }



}
