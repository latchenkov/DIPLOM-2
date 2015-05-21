<?php namespace App\Http\Controllers;

use App\Location;
use App\Category;
use App\Ad;

class HomeController extends Controller {
    
        public function index()	{
		return view('index');
	}

	public function getLocationList(){
            return Location::all();
        }

        public function getCategoryList(){
            return Category::all();
        }
       
        public function getAllAds(){
            return Ad::getAllAds();
        }

}
