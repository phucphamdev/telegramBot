<?php
	namespace App\Http\Controllers;


	use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use Telegram\Bot\Laravel\Facades\Telegram;

	class TelegramController extends Controller
	{

        public function handle(Request $request)
        {
            // Extract data from the request
            $data = $request->all();

            // Validate the request
            $validatedData = $request->validate([
                'chat_id' => 'required|integer',
                'text' => 'required|string',
                'time' => 'required|date',
                'label' => 'required|string',
                'price' => 'required|numeric'
            ]);

            // Save data to the database
            $data = [
                'chat_id' => $validatedData['chat_id'],
                'text' => $validatedData['text'],
                'time' => $validatedData['time'],
                'label' => $validatedData['label'],
                'price' => $validatedData['price']
            ];

            DB::table('nhap')->insert($data);

            return response()->json(['message' => 'Data saved successfully'], 200);
        }


        public function webhook(Request $request)
        {
            $update = Telegram::commandsHandler(true);

            $chatId = $update->getMessage()->getChat()->getId();
            $message = $update->getMessage()->getText();

            Telegram::sendMessage([
                'chat_id' => env('TELEGRAM_CHANNEL_ID', ''),
                'parse_mode' => 'HTML',
                'text' => $message
            ]);

            if ($message == '/start') {
                Telegram::sendMessage([
                    'chat_id' => $chatId,
                    'text' => 'Welcome to our bot!',
                ]);
            }

            return 'ok';
        }




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
