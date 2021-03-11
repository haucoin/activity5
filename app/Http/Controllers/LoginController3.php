<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Services\Business\SecurityService;

class LoginController3 extends Controller {
	
	public function index(Request $request) {
		
		$username = $request->input('username');
		$password = $request->input('password');
		
		$this->validateForm($request);
		
		$user = new UserModel($username, $password);
		
		$service = new SecurityService();
		$status = $service->login($user);
		
		if($status) {
			$data = ['model' => $user];
			return view('loginPassed')->with($data);
		}
		else {
			return view('loginFailed');
		}
		
	}
	
	public function validateForm(Request $request) {
		
		// Setup Data Validation Rules for Login Form
		$rules = ['username' => 'Required | Between:4,10 | Alpha',
				'password' => 'Required | Between:4,10'];
		
		// Run Data Validation Rules
		$this->validate($request, $rules);
		
	}
}
