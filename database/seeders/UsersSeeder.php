<?php
	
	namespace Database\Seeders;
	
	use App\Models\User;
	use App\Models\UserInfo;
	use Faker\Generator;
	use Illuminate\Database\Seeder;
	use Illuminate\Support\Facades\Hash;
	use Illuminate\Support\Str;
	
	class UsersSeeder extends Seeder
	{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run(Generator $faker)
		{
			$demoUser = User::create([
				'first_name' => $faker->firstName,
				'UUID' =>  "User_".Str::random(30),
				'last_name' => $faker->lastName,
				'email' => 'toidicodedao@gmail.com',
				'password' => Hash::make('12345678'),
				'email_verified_at' => now(),
				'api_token' => Hash::make('demo@demo'),
			]);
			
			$this->addDummyInfo($faker, $demoUser);
			
			$demoUser2 = User::create([
				'first_name' => $faker->firstName,
				'UUID' =>  "User_".Str::random(30),
				'last_name' => $faker->lastName,
				'email' => 'admin@demo.com',
				'password' => Hash::make('demo'),
				'email_verified_at' => now(),
				'api_token' => Hash::make('admin@demo'),
			]);
			
			$this->addDummyInfo($faker, $demoUser2);
			
			User::factory(50)->create()->each(function (User $user) use ($faker) {
				$this->addDummyInfo($faker, $user);
			});
		}
		
		private function addDummyInfo(Generator $faker, User $user)
		{
			$dummyInfo = [
				'company' => $faker->company,
				'phone' => $faker->phoneNumber,
				'website' => $faker->url,
				'language' => $faker->languageCode,
				'country' => $faker->countryCode,
			];
			
			$info = new UserInfo();
			foreach ($dummyInfo as $key => $value) {
				$info->$key = $value;
			}
			$info->user()->associate($user);
			$info->save();
		}
	}
