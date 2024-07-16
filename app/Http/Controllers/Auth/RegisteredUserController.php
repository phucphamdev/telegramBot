<?php
	
	namespace App\Http\Controllers\Auth;
	
	use App\Http\Controllers\Controller;
	use App\Models\User;
	use App\Providers\RouteServiceProvider;
	use Illuminate\Auth\Events\Registered;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Support\Facades\Hash;
	use Illuminate\Support\Str;
	use Illuminate\Validation\Rules;
	
	class RegisteredUserController extends Controller
	{
		/**
		 * Handle an incoming registration request.
		 *
		 * @param \Illuminate\Http\Request $request
		 *
		 * @return \Illuminate\Http\RedirectResponse
		 *
		 * @throws \Illuminate\Validation\ValidationException
		 */
		public function store(Request $request)
		{
			$request->validate([
				'first_name' => 'required|string|max:255',
				'last_name' => 'required|string|max:255',
				'email' => 'required|string|email|max:255|unique:users',
				'password' => ['required', 'confirmed', Rules\Password::defaults()],
			]);
			
			$user = User::create([
				'first_name' => $request->first_name,
				'last_name' => $request->last_name,
				'email' => $request->email,
				'password' => Hash::make($request->password),
			]);
			
			event(new Registered($user));
			
			Auth::login($user);
			
			return redirect(RouteServiceProvider::HOME);
		}
		
		/**
		 * Display the registration view.
		 *
		 * @return \Illuminate\View\View
		 */
		public function create()
		{
			return view('auth.register');
		}
		
		public function apiGetUsers()
		{
			$get_user_all = User::all();
			
			return response($get_user_all);
		}
		
		public function apiGetUsersById($id)
		{
			if (isset($id) && $id) {
				$getUser = User::find($id);
				
				if (empty($getUser)) {
					return response('No Data');
				}
				
				return response($getUser);
			}
			
			return response('No Data');
			
		}
		
		public function apiGetUsersByEmail(Request $request)
		{
			if (isset($request->email) && $request->email) {
				$user = User::where('email', $request->email)->first();
				
				if (empty($user)) {
					return response('No Data');
				}
				
				return response($user);
			}
			
			return response('No Data');
			
		}
		
		
		/**
		 * Handle an incoming api registration request.
		 *
		 * @param \Illuminate\Http\Request $request
		 *
		 * @return \Illuminate\Http\Response
		 *
		 * @throws \Illuminate\Validation\ValidationException
		 */
		public function apiStore(Request $request)
		{
			$request->validate([
				'first_name' => 'required|string|max:255',
				'last_name' => 'required|string|max:255',
				'email' => 'required|string|email|max:255|unique:users',
				'password' => ['required', 'confirmed', Rules\Password::defaults()],
			]);
			
			$token = Str::random(60);
			$user = User::create([
				'first_name' => $request->first_name,
				'last_name' => $request->last_name,
				'email' => $request->email,
				'password' => Hash::make($request->password),
				'api_token' => hash('sha256', $token),
			]);
			
			return response($user);
		}
	}
