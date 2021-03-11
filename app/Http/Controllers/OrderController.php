<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerModel;
use App\Services\Business\SecurityService;

class OrderController extends Controller {
	
	public function index(Request $request) {
		
		$customer = new CustomerModel($request->input('firstName'), $request->input('lastName'));
		
		
		
		$product = $request->input('product');
		$userId = $request->input('userId');
		
		
		$service = new SecurityService();
		$status = $service->addAllInformation($product, $userId, $customer);
		
		if($status) {
			echo "Commit success";
		}
		else {
			echo "Commit fail, rolled back";
		}
		return view('order');
	}
	
}
