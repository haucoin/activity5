<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Services\Business\SecurityService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller {
	
	public function index(Request $request) {
		
		Log::info("Entering LoginController: Index()");
		
		$username = $request->input('username');
		$password = $request->input('password');
		
		Log::info("Parameters are: ", array("username" => $username, "password" => $password));
		
		$user = new UserModel($username, $password);
		
		$service = new SecurityService();
		$status = $service->login($user);
		
		if($status) {
			Log::info("Exiting LoginController: Index() with a login successful");
			session()->put('security', 'enabled');
			$data = ['model' => $user];
			return view('loginPassed')->with($data);
		}
		else {
			Log::info("Exiting LoginController: Index() with a login failure");
			return view('loginFailed');
		}
		
	}
	
	public function logout(Request $request) {
		
		Auth::logout();
		// Added for webpage security
		session()->put('security', 'disabled');
		Log::info("LoginController: Logout()");
		return redirect('/login');
	}
}
