<?php
	namespace App\Http\Controllers;
	
	use Illuminate\Http\Request;
	use Telegram\Bot\Laravel\Facades\Telegram;
	
	class TelegramController extends Controller
	{
		public function updatedActivity()
		{
			$activity = Telegram::getUpdates();
			echo "<pre>";
			print_r($activity);
			echo "</pre>";die('TelegramController');
			
		}
		
		public function contactForm()
		{
			return view('pages.contactformtelegram.contactform');
		}
		
		public function storeMessage(Request $request)
		{
//			$request->validate([
//				'email' => 'required|email',
//				'message' => 'required'
//			]);
			
			$text = "A new contact us query\n"
				. "<b>Email Address: </b>\n"
				. "$request->email\n"
				. "<b>Message: </b>\n"
				. $request->message;
			
			Telegram::sendMessage([
				'chat_id' => env('TELEGRAM_CHANNEL_ID', ''),
				'parse_mode' => 'HTML',
				'text' => $text
			]);
			
			return redirect()->back();
		}
	}
