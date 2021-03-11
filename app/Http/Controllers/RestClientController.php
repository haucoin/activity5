<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class RestClientController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        // Call Rest API
        $serviceURL = "http://localhost/activity5/public/";
        $api = "usersrest";
        $param = "";
        $uri = $api . "/" . $param;
        
        try {
        	// Make REST call
        	$client = new Client(['base_uri' => $serviceURL]);
        	$response = $client->request('GET', $uri);
        	
        	// Return JSON or error
        	if($response->getStatusCode() == 200) {
        		return $response->getBody();
        	}
        	else {
        		return "There was an error: " . $response->getStatusCode();
        	}
        }
        catch(ClientException $e) {
        	// Return error
        	return "There was an exception: " . $e->getMessage();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
    	
    	// Call Rest API
    	$serviceURL = "http://localhost/activity5/public/";
    	$api = "usersrest";
    	$param = $id;
    	$uri = $api . "/" . $param;
    	
    	try {
    		// Make REST call
    		$client = new Client(['base_uri' => $serviceURL]);
    		$response = $client->request('GET', $uri);
    		
    		// Return JSON or error
    		if($response->getStatusCode() == 200) {
    			return $response->getBody();
    		}
    		else {
    			return "There was an error: " . $response->getStatusCode();
    		}
    	}
    	catch(ClientException $e) {
    		// Return error
    		return "There was an exception: " . $e->getMessage();
    	}
    }

}
