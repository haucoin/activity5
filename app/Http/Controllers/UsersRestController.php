<?php

namespace App\Http\Controllers;

use App\Services\Business\SecurityService;
use App\Models\DTO;
use Illuminate\Support\Facades\Log;
use Exception;


class UsersRestController extends Controller {
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
    	
    	try {
    		Log::info("Inside try of UsersRestController@index");
    		$service = new SecurityService();
    		$data = $service->getAllUsers();
    		Log::info("Data ", $data);
    		
    		$dto = new DTO(200, "OK", $data);
    		
    		$json = json_encode($dto);
    		
    		return $json;
    	}
    	catch(Exception $e) {
    		
    		Log::info("Inside catch of UsersRestController@index: '{$e->getMessage()}'");
    		$dto = new DTO(400, $e->getMessage(), array());
    		
    		$json = json_encode($dto);
    		
    		return $json;
    	}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
    	
    	try {
    		$service = new SecurityService();
    		$data = $service->getUser($id);
    		
    		$dto = new DTO(200, "OK", $data);
    		
    		$json = json_encode($dto);
    		
    		return $json;
    	}
    	catch(Exception $e) {
    		
    		Log::info("Inside catch of UsersRestController@show: '{$e->getMessage()}'");
    		$dto = new DTO(400, $e->getMessage(), array());
    		
    		$json = json_encode($dto);
    		
    		return $json;
    	}
    }

}
