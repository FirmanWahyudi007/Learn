<?php

namespace App\Http\Controllers;

use Request;
use Route;
use GuzzleHttp\Client;


class HomeController extends Controller
{
    public function index()
    {
        // Create your request to your API
        $request = Request::create('/api/users', 'GET');
        $response = Route::dispatch($request);
        $result = json_decode($response->getContent());
        $users = $result->data;
    	return view('home',compact("users"));
    }

    public function create()
    {
      // code...
      return view('home');
    }
    public function add(Request $request)
    {
    	$data2 = [
		    'name' => 'coba',
		    'email' => 'coba11@gmail.com',
		    'password' => 'coba123',
		];
    	$curl = curl_init();
		curl_setopt_array($curl, array(
		    CURLOPT_URL => "/api/register",
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_ENCODING => "",
		    CURLOPT_MAXREDIRS => 10,
		    CURLOPT_TIMEOUT => 30,
		    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		    CURLOPT_CUSTOMREQUEST => "POST",
		    CURLOPT_POSTFIELDS => json_encode($data2),
		    CURLOPT_HTTPHEADER => array(
		    	// Set here requred headers
		        "accept: */*",
		        "cache-control: no-cache",
		        "content-type: application/json",
		    ),
		));
		$response = curl_exec($curl);
		dd(curl_getinfo($curl,CURLINFO_CONTENT_TYPE  ));
		if (curl_getinfo($curl,CURLINFO_RESPONSE_CODE) == 302) {
			$err = "The given data was invalid.";
		}
		curl_close($curl);

		if ($err) {
		    echo "cURL Error #:" . $err;
		} else {
		    print_r(json_decode($response));
		}

		return view('welcome');
    }
}
