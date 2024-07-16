<?php
	
	namespace Database\Seeders;
	
	use App\Models\Momo;
	use Illuminate\Database\Console\Seeds\WithoutModelEvents;
	use Illuminate\Database\Seeder;
	
	class MomoSeeder extends Seeder
	{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run()
		{
			Momo::create([
				'id' => '888',
				'username' => '0569370708',
				'password' => '123456',
				'otp' => '1268',
				'setupkey' => 'kGHdZSTAg6mZz+o8MHTUk5kvd5XWmaTzzji2l9pF/WGPsbTzHQThwrRPTe3H70rd',
				'appVer' => '40044',
				'appCode' => '4.0.4',
				'auth_token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJ1c2VyIjoiMDE4NjkzNzA3MDgiLCJpbWVpIjoiNjAwQkFCNDktOUJCMi04MENGLTBDNzMtQzczMTRDMjBBRUREIiwiQkFOS19DT0RFIjoiMCIsIkJBTktfTkFNRSI6IiIsIk1BUF9TQUNPTV9DQVJEIjowLCJOQU1FIjoiQ2FvIFRo4buLIEhp4buBbiIsIklERU5USUZZIjoiVU5DT05GSVJNIiwiREVWSUNFX09TIjoiYW5kcm9pZCIsIkFQUF9WRVIiOjQwMDI0LCJhZ2VudF9pZCI6NzczMjExNTgsInNlc3Npb25LZXkiOiJMMFhpc0E5REJLSDVNaUdXNE9TemhuamcvZG1qTnZTNGdqMmtZemszeUtLN1owVWVCaEVzT2c9PSIsIk5FV19MT0dJTiI6dHJ1ZSwicGluIjoiTmVnb2JGbm05c1E9IiwiaXNTaG9wIjpmYWxzZSwicmVmcmVzaFRva2VuSWQiOiJmZWI4MzliYS01MDQwLTQxNGEtODk2Zi05YjM1NjZkOTQ1YjUiLCJ1c2VyX3R5cGUiOjAsImtleSI6Im1vbW8iLCJleHAiOjE2NjU5MTA0MjR9.r4t3yp1MeLzv9-UMD7w8MfY1S9ij37JHJydPcvPDi1v5ePtN1S2gesOtsq4KiLHiAyE5aPZBuLlyRPS-8b6sk0IjeTGgiDui3s3Crta42ZUMH0YXIYATO-dTMXaQTIuGNzL6OnGgc5nUCGCHVLfQULlJMXYbjhSUu6bruic9-9f_dHaX6a1zZUPj_Zjf8lDjN3VsGmdOFCWdFncCZqgp-dxE0n5IUE299Zg4zPADrg31XleIJmpreTZBaZZwc48fss48WWm71uOoeOkx_sc4C3VU-C5ous86-GgFKS_72swmO5VdvuTnbEkQOMu8qv3UGU81r-ulz9Yz74GwC9WoTg',
				'requestkey' => 'Iqj4KZgOTrSRykpusQouXES8xBl5ALCaC8Ym9vWMzYjif4owqyMcD58CoUvD4sFLizL3P0heRLZBi5BE8x0DkQ==',
				'name' => 'Admin',
				'device' => 'SM-G532F',
				'hardware' => 'mt6735',
				'facture' => 'samsung',
				'authorization' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJ1c2VyIjoiMDE4NjkzNzA3MDgiLCJpbWVpIjoiNjAwQkFCNDktOUJCMi04MENGLTBDNzMtQzczMTRDMjBBRUREIiwiQkFOS19DT0RFIjoiMCIsIkJBTktfTkFNRSI6IiIsIk1BUF9TQUNPTV9DQVJEIjowLCJOQU1FIjoiQ2FvIFRo4buLIEhp4buBbiIsIklERU5USUZZIjoiVU5DT05GSVJNIiwiREVWSUNFX09TIjoiYW5kcm9pZCIsIkFQUF9WRVIiOjQwMDI0LCJhZ2VudF9pZCI6NzczMjExNTgsInNlc3Npb25LZXkiOiJMMFhpc0E5REJLSDVNaUdXNE9TemhuamcvZG1qTnZTNGdqMmtZemszeUtLN1owVWVCaEVzT2c9PSIsIk5FV19MT0dJTiI6dHJ1ZSwicGluIjoiTmVnb2JGbm05c1E9IiwiaXNTaG9wIjpmYWxzZSwicmVmcmVzaFRva2VuSWQiOiJmZWI4MzliYS01MDQwLTQxNGEtODk2Zi05YjM1NjZkOTQ1YjUiLCJ1c2VyX3R5cGUiOjAsImtleSI6Im1vbW8iLCJleHAiOjE2NjU5MTA0MjR9.r4t3yp1MeLzv9-UMD7w8MfY1S9ij37JHJydPcvPDi1v5ePtN1S2gesOtsq4KiLHiAyE5aPZBuLlyRPS-8b6sk0IjeTGgiDui3s3Crta42ZUMH0YXIYATO-dTMXaQTIuGNzL6OnGgc5nUCGCHVLfQULlJMXYbjhSUu6bruic9-9f_dHaX6a1zZUPj_Zjf8lDjN3VsGmdOFCWdFncCZqgp-dxE0n5IUE299Zg4zPADrg31XleIJmpreTZBaZZwc48fss48WWm71uOoeOkx_sc4C3VU-C5ous86-GgFKS_72swmO5VdvuTnbEkQOMu8qv3UGU81r-ulz9Yz74GwC9WoTg',
				'imei' => '791BB495-DDEB-586C-457A-57A88BCE9679',
				'rkey' => 'Uk2jKjwmfVwAStTjGykw5nphWeijmXDn',
				'onesignal' => 'kGI9NmLdBhvWi1WqRJdlKH:NE1no66In-ZC0Tk6HRSrXgJ72I8oHn-YiMeZaP1osLM-6enhBGc-rNnHhTM-WwLmTL4JNdwqPNf2kx6ONyuarW72pseTa7qSyoolhH6BVVgYACCuP-IaypAhWr0_vQf41pxSHlF-8OwN',
				'SECUREID' => '1d9bdebf3b4f1718',
				'ohash' => 'ac95b89ed7041648d71ec29427286222ca0285b6c70af70b40f10d2016d533d2',
				'sessionkey' => '6c5be579-c16a-4e01-b8c3-f8e958933b7a',
				'setupKeyDecrypt' => 'kGHdZSTAg6mZz+o8MHTUk5kvd5XWmaTzzji2l9pF/WGPsbTzHQThwrRPTe3H70rd',
			]);
		}
	}
