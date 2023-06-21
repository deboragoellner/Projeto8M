<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use DB;


class MapsController extends Controller
{


    public function gmaps()
    {
    	$locations = DB::table('locations')->get();
    	return view('gmaps',compact('locations'));
    }


}
