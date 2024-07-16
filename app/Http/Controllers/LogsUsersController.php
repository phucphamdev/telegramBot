<?php

	namespace App\Http\Controllers;

	use App\Http\Requests\StoreLogsUsersRequest;
	use App\Http\Requests\UpdateLogsUsersRequest;
	use App\Models\LogsUsers;

	class LogsUsersController extends Controller
	{
		/**
		 * Display a listing of the resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function index()
		{
			return  view("pages.logsusers.index");
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
		 * @param \App\Http\Requests\StoreLogsUsersRequest $request
		 * @return \Illuminate\Http\Response
		 */
		public function store(StoreLogsUsersRequest $request)
		{
			//
		}

		/**
		 * Display the specified resource.
		 *
		 * @param \App\Models\LogsUsers $logsUsers
		 * @return \Illuminate\Http\Response
		 */
		public function show(LogsUsers $logsUsers)
		{
			//
		}

		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param \App\Models\LogsUsers $logsUsers
		 * @return \Illuminate\Http\Response
		 */
		public function edit(LogsUsers $logsUsers)
		{
			//
		}

		/**
		 * Update the specified resource in storage.
		 *
		 * @param \App\Http\Requests\UpdateLogsUsersRequest $request
		 * @param \App\Models\LogsUsers $logsUsers
		 * @return \Illuminate\Http\Response
		 */
		public function update(UpdateLogsUsersRequest $request, LogsUsers $logsUsers)
		{
			//
		}

		/**
		 * Remove the specified resource from storage.
		 *
		 * @param \App\Models\LogsUsers $logsUsers
		 * @return \Illuminate\Http\Response
		 */
		public function destroy(LogsUsers $logsUsers)
		{
			//
		}
	}
