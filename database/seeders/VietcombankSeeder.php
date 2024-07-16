<?php
	
	namespace Database\Seeders;
	
	use App\Http\Controllers\VietcombankController;
	use Illuminate\Database\Console\Seeds\WithoutModelEvents;
	use Illuminate\Database\Seeder;
	use App\Models\Vietcombank;
	
	class VietcombankSeeder extends Seeder
	{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run()
		{
			Vietcombank::create([
				'id' => Null,
				'username' => '0342741490',
				'password' => 'Quan999999#',
				'account_number' => '1017107871',
				'account_name' => 'HOANG THI THANH PHUONG'
			]);
		}
	}
