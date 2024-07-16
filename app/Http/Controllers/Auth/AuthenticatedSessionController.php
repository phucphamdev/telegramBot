<?php
	
	namespace App\Http\Controllers\Auth;
	
	use App\Http\Controllers\Controller;
	use App\Http\Requests\Auth\LoginRequest;
	use App\Models\User;
	use App\Providers\RouteServiceProvider;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Validation\ValidationException;
	
	class AuthenticatedSessionController extends Controller
	{
		public function create()
		{
			return view('auth.login');
		}
		
		public function store(LoginRequest $request)
		{
			$request->authenticate();
			
			$request->session()->regenerate();
			
			return redirect()->intended(RouteServiceProvider::HOME);
		}
		
		public function apiStore(LoginRequest $request)
		{
			if (!Auth::attempt($request->only('email', 'password'))) {
				throw ValidationException::withMessages([
					'email' => ['The provided credentials are incorrect']
				]);
			}
			
			$user = User::where('email', $request->email)->first();
			return response($user);
		}
		
		public function apiVerifyToken(Request $request)
		{
			$request->validate([
				'api_token' => 'required'
			]);
			
			$user = User::where('api_token', $request->api_token)->first();
			
			if (!$user) {
				throw ValidationException::withMessages([
					'token' => ['Invalid token']
				]);
			}
			return response($user);
		}
		
		public function destroy(Request $request)
		{
			Auth::guard('web')->logout();
			
			$request->session()->invalidate();
			
			$request->session()->regenerateToken();
			
			return redirect('/');
		}
	}
