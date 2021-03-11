<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerModel;
use App\Services\Business\SecurityService;

class CustomerController extends Controller {
	
	public function index(Request $request) {
		
		$firstName = $request->input('firstName');
		$lastName = $request->input('lastName');
		
		
		$nextId = 0;
		return redirect('neworder')->with('nextId', $nextId)->with('firstName', $firstName)->with('lastName', $lastName);
	}
}
