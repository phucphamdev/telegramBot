<?php
	
	namespace App\Http\Controllers;
	
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Support\Facades\Hash;
	use App\Models\User;
	use Illuminate\Support\Str;
	use Validator;
	
	class AuthController extends Controller
	{
		/**
		 * Create User
		 * @param Request $request
		 * @return User|\Illuminate\Http\JsonResponse
		 */
		public function createUser(Request $request)
		{
			try {
				//Validated
				$validateUser = Validator::make($request->all(),
					[
						'name' => 'required',
						'email' => 'required|email|unique:users,email',
						'password' => 'required'
					]);
				
				if ($validateUser->fails()) {
					return response()->json(array(
						'status' => false,
						'message' => 'validation error',
						'errors' => $validateUser->errors()
					), 401);
				}
				
				$user = User::create([
					'first_name' =>  $request->name,
					'UUID' =>  "User_".Str::random(30),
					'last_name' =>  $request->name,
					'email' => $request->email,
					'password' => Hash::make($request->password),
					'email_verified_at' => now(),
					'type' =>1,
					'api_token' => Hash::make( $request->email.$request->name),
				]);
				
				$user = User::where('email',$request->email)->firstOrFail();
				
				return response()->json([
					'status' => true,
					'message' => 'User Created Successfully',
					'token' => $user->createToken("auth_token")->plainTextToken
				], 200);
				
			} catch (\Throwable $th) {
				return response()->json([
					'status' => false,
					'message' => $th->getMessage()
				], 500);
			}
		}
		
		/**
		 * Login The User
		 * @param Request $request
		 * @return User
		 */
		public function loginUser(Request $request)
		{
			try {
				$validateUser = Validator::make($request->all(),
					[
						'email' => 'required|email',
						'password' => 'required'
					]);
				
				if ($validateUser->fails()) {
					return response()->json([
						'status' => false,
						'message' => 'validation error',
						'errors' => $validateUser->errors()
					], 401);
				}
				
				if (!Auth::attempt($request->only(['email', 'password']))) {
					return response()->json([
						'status' => false,
						'message' => 'Email & Password does not match with our record.',
					], 401);
				}
				
				$user = User::where('email', $request->email)->first();
				
				return response()->json([
					'status' => true,
					'message' => 'User Logged In Successfully',
					'token' => $user->createToken("API TOKEN")->plainTextToken
				], 200);
				
			} catch (\Throwable $th) {
				return response()->json([
					'status' => false,
					'message' => $th->getMessage()
				], 500);
			}
		}
	}