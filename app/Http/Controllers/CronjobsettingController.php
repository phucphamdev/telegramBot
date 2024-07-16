<?php
	
	namespace App\Http\Controllers;
	
	use App\Models\Cronjobsetting;
	use App\Models\System;
	use Illuminate\Http\Request;
	
	class CronjobsettingController extends Controller
	{
		/**
		 * Display a listing of the resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function index()
		{
			$info = System::where('id', 999)->first();
			$object = Cronjobsetting::where('id', 8899)->first();
			
			return view('pages.cronjobsetting.index', compact('info','object'));
		}
		
		/**
		 * Show the form for creating a new resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function create()
		{
			//
		}
		
		/**
		 * Store a newly created resource in storage.
		 *
		 * @param \Illuminate\Http\Request $request
		 * @return \Illuminate\Http\Response
		 */
		public function store(Request $request)
		{
			//
		}
		
		/**
		 * Display the specified resource.
		 *
		 * @param \App\Models\Cronjobsetting $cronjobsetting
		 * @return \Illuminate\Http\Response
		 */
		public function show(Cronjobsetting $cronjobsetting)
		{
			//
		}
		
		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param \App\Models\Cronjobsetting $cronjobsetting
		 * @return \Illuminate\Http\Response
		 */
		public function edit(Cronjobsetting $cronjobsetting)
		{
			//
		}
		
		/**
		 * Update the specified resource in storage.
		 *
		 * @param \Illuminate\Http\Request $request
		 * @param \App\Models\Cronjobsetting $cronjobsetting
		 * @return \Illuminate\Http\Response
		 */
		public function update(Request $request, Cronjobsetting $cronjobsetting)
		{
			$data = $request->all();
			
			$list = [
				'cancelrecharge',
				'updateHistoryPartners',
				'deleterecharge',
				'historybank',
				'vietcombank',
				'acbnodejs',
				'viettelpay',
				'tpbank',
				'mbbank',
				'momo',
			];
			
			$arr = [];
			foreach ($data as $key => $val) {
				if (in_array($key, $list)) {
					$arr[$key] = $val;
				}
			}
			
			$object = Cronjobsetting::where('id', 8899)->first();
			
			$object->update($arr);
			$object->save();
			
			return response()->json(true);
		}
		
		/**
		 * Remove the specified resource from storage.
		 *
		 * @param \App\Models\Cronjobsetting $cronjobsetting
		 * @return \Illuminate\Http\Response
		 */
		public function destroy(Cronjobsetting $cronjobsetting)
		{
			//
		}
	}
