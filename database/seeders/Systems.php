<?php
	
	namespace Database\Seeders;
	
	use App\Models\System;
	use Illuminate\Database\Seeder;
	
	class Systems extends Seeder
	{
		public function run()
		{
			System::create([
				'id' => 999,
				'port' => 3306,
				'url' => 'https://toidicodedao.click',
				'username' => 'demo',
				'password' => 'demo',
				'customfields1' => 'demo',
				'customfields2' => 'demo',
				'customfields3' => 'demo',
				'customfields4' => 'demo',
				'customfields5' => 'demo',
			]);
		}
	}
