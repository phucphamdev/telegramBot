<?php
	
	namespace App\Http\Controllers;
	
	use App\Models\User;
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Support\Facades\File;
	
	class PagesController extends Controller
	{
		public function __construct()
		{
//			$this->middleware('auth:api');
		}
		
		public function index()
		{
			// Get view file location from menu config
			$view = theme()->getOption('page', 'view');
			$listUser = User::orderBy('id', 'desc')->paginate(10);
			
			$user_role = Auth::user()->role();
			$user = User::where('id',Auth::user()->id)->first();
			if ($user_role == 'admin')
			{
				// Check if the page view file exist
				if (view()->exists('pages.' . $view))
				{
					return view('pages.' . $view, compact('listUser','user'));
				}
			}
			
			if ($user_role == 'partner')
			{
				// Check if the page view file exist
				if (view()->exists('users.' . $view))
				{
					return view('users.' . $view, compact('listUser','user'));
				}
			}
			
			
			abort(404, 'We can\'t find that page.');
		}
		
		/**
		 * Temporary function to replace icon duotone
		 */
		public function replaceIcons()
		{
			$fileContent = file_get_contents(public_path('icon_replacement.txt'));
			$lines = explode("\n", $fileContent);
			
			$patterns = [];
			$replacements = [];
			foreach ($lines as $line) {
				$el = explode(' - ', $line);
				if (empty($line)) {
					continue;
				}
				$patterns[] = trim($el[0]);
				$replacements[] = trim($el[1]);
			}
			
			$files = File::allFiles(resource_path());
			$filtered = array_filter($files, function ($str) {
				return strpos($str, ".php") !== false;
			});
			
			foreach ($filtered as $file) {
				$bladeFileContent = file_get_contents($file->getPathname());
				
				$bladeFileContent = str_replace($patterns, $replacements, $bladeFileContent);
				
				file_put_contents($file->getPathname(), $bladeFileContent);
			}
		}
	}
