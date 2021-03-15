<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
    	$curl = curl_init();
    	curl_setopt_array($curl, array(
    		CURLOPT_URL => 'http://127.0.0.1:8000/api/users',
    		CURLOPT_RETURNTRANSFER => true,
    		CURLOPT_HTTPHEADER => array(
    			"cache-control: no-cache",
    		),
    	));
    	$response = curl_exec($curl);
    	curl_close($curl);

    	$result = json_decode($response);
    	$users = $result->data;
    	/*echo "<pre>";
    	print_r($user);
    	echo "</pre>";*/
    	return view('home',compact("users"));
    }
}
