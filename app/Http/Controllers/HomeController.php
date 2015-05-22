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
            $data = Ad::all()->sortByDesc('id')->values();
                if ($data->isEmpty()){
                    $result['status']='warning';
                    $result['message'] = "Внимание! В базе данных нет объявлений.";
                }
                else {
                    $result['status'] = 'success';
                    $result['data'] = $data;
                }
            return response()->json($result);
        }

}
