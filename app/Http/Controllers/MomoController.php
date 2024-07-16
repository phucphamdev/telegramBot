<?php
	
	namespace App\Http\Controllers;
	
	use App\DataTables\MomoTranferDataTable;
	use App\Models\Momo as ModelsMomo;
	use App\Models\MomoTranfer;
	use Illuminate\Http\Request;
	use App\Helper\Bank\Momo;
	use Illuminate\Support\Facades\Auth;
	
	class MomoController extends Controller
	{
		
		public function index()
		{
			$user_role = Auth::user()->role();
			
			$data = $this->getHistory();
			
			if($data['status'] == 200 && is_array($data['momoMsg']['tranList']))
			{
				foreach($data['momoMsg']['tranList'] as $item)
				{
					$get['transId'] = $item['transId'];
					$get['io'] = $item['io'];
					$get['partnerId'] = $item['partnerId'];
					$get['partnerName'] = $item['partnerName'];
					$get['amount'] = $item['amount'];
					$get['comment'] = $item['comment'];
					$get['postBalance'] = $item['postBalance'];
					$get['status'] = $item['status'];
					
					$object = MomoTranfer::where('transId',$get['transId'])->first();
					
					if ($object)
					{
						$object->update($get);
						$object->save();
						echo "update";
					}else
					{
						MomoTranfer::create($get);
						echo "create";
					}
				}
				
				return view('pages.momo.index',compact('data'));
			}
			
			return view('pages.momo.index');
		}
		
		public function update2(Request $request)
		{
			$data = [
				'username' => $request->input('username'),
				'password' => $request->input('password'),
			];
			
			$object = ModelsMomo::where('id', 888)->first();
			
			$object->update($data);
			$object->save();
			
			return redirect()->intended('system');
		}
		
		public function DoLogin(Request $request)
		{
			// luu OTP vao DB
			$object = ModelsMomo::where('id', 888)->first();
			$data = [
				'otp' => $request->input('otp')
			];
			$object->update($data);
			$object->save();
			
			// khoi tao Momo
			$momoObject = new Momo();
			//  lay OPT mới bỏ vào và  checkOTP
			$data_momo = array(
				'username' => $object->username,
				'rkey' => $object->rkey,
				'onesignal' => $object->onesignal,
				'imei' => $object->imei,
				'secureid' => $object->SECUREID,
			);
			
			$cf = $momoObject->checkOtp($data_momo, $object->otp);
			
			// Neu có kết quả thi mới mới vào login , khong thi out ra báo lỗi
			if (!empty($cf['extra']['setupKey']) && !empty($cf['extra']['ohash']))
			{
				$data = [
					'setupkey' => $cf['extra']['setupKey'],
					'ohash' => $cf['extra']['ohash']
				];
				$object->update($data);
				$object->save();
				
				// login
				$arrLogin = array(
					'username' => $object->username,
					'password' => $object->password,
					'rkey' => $object->rkey,
					'onesignal' => $object->onesignal,
					'setupkey' => $object->setupkey,
					'imei' => $object->imei,
					'secureid' => $object->SECUREID,
					'ohash' => $object->ohash,
				);
				
				$login = $momoObject->userLogin($arrLogin);
				
				// ket quả login thanh cong
				if (!empty($login['extra']['AUTH_TOKEN'])) {
					$requestKey = trim($momoObject->get_RSAencrypt($login['extra']['REQUEST_ENCRYPT_KEY']));
					$authToken = trim($login['extra']['AUTH_TOKEN']);
					$sessionKey = trim($login['extra']['SESSION_KEY']);
					$data = [
						'requestKey' => $requestKey,
						'auth_token' => $authToken,
						'sessionkey' => $sessionKey
					];
					$object->update($data);
					$object->save();
					
					return redirect()->intended('system');
				}
				else
				{
					echo "Dang Nhap Loi extra - AUTH_TOKEN ";
				}
			}
			else
			{
				echo "Dang Nhap Loi  - extra  - setupKey ";
			}
		}
		
		public function loginOtp()
		{
			$object = ModelsMomo::where('id', 888)->first();
			$momoObject = new Momo();
			$rkey = $momoObject->rkey(32);
			$get_imei = $momoObject->get_imei();
			$onesignal = $momoObject->get_onesignal();
			$get_secureid = $momoObject->secureid();
			$isVoice = true;
			
			$checkUser = $momoObject->checkUserBe(
				array(
					'username' => $object->username,
					'rkey' => $rkey,
					'onesignal' => $onesignal,
					'imei' => $get_imei,
					'secureid' => $get_secureid,
				)
			);
			
			$momoObject->getOtp(
				array(
					'username' => $object->username,
					'password' => $object->password,
					'rkey' => $rkey,
					'onesignal' => $onesignal,
					'imei' => $get_imei,
					'secureid' => $get_secureid
				)
			);
			
			$data = [
				'rkey' => $rkey,
				'onesignal' => $onesignal,
				'imei' => $get_imei,
				'secureid' => $get_secureid,
			];
			
			$object->update($data);
			$object->save();
			
			return redirect()->intended('system');
		}
		
		public function getHistory()
		{
			$momoObject = new Momo();
			$object = ModelsMomo::where('id', 888)->first();
			
			$data_momo = [
				'username' => $object->username,
				'rkey' => $object->rkey,
				'onesignal' => $object->onesignal,
				'ohash' => $object->ohash,
				'setupkey' => $object->setupkey,
				'imei' => $object->imei,
				'requestkey' => $object->requestkey,
				'auth_token' => $object->auth_token,
			];
			
			
			$getHistory = $momoObject->getHistory($data_momo,144);
			
			return $getHistory;
		}
		
		public function getBalance()
		{
			$momoObject = new Momo();
			$object = ModelsMomo::where('id', 888)->first();
			
			$data_momo = array(
				'username' => $object->username,
				'password' => $object->password,
				'rkey' => $object->rkey,
				'onesignal' => $object->onesignal,
				'ohash' => $object->ohash,
				'otp' => $object->otp,
				'setupkey' => $object->setupkey,
				'imei' => $object->imei,
				'requestkey' => $object->requestkey,
				'auth_token' => $object->auth_token,
			);
			
			$getHistory = $momoObject->getBalance($data_momo,24);
			
			return $getHistory;
		}
		
		public function userLogin()
		{
			$momoObject = new Momo();
			$object = ModelsMomo::where('id', 888)->first();
			
			$data_momo = array(
				'secureid' => $object->SECUREID,
				'username' => $object->username,
				'password' => $object->password,
				'onesignal' => $object->onesignal,
				'setupkey' => $object->setupkey,
				'ohash' => $object->ohash,
				'imei' => $object->imei
			);
			
			
			$userLogin = $momoObject->userLogin($data_momo);
			
			return $userLogin;
		}
		
		public function bankCodeList()
		{
			$momoObject = new Momo();
			$object = ModelsMomo::where('id', 888)->first();
			
			$data_momo = array(
				'secureid' => $object->SECUREID,
				'username' => $object->username,
				'password' => $object->password,
				'onesignal' => $object->onesignal,
				'setupkey' => $object->setupkey,
				'ohash' => $object->ohash,
				'imei' => $object->imei,
				'auth_token' => $object->auth_token,
				'requestkey' => $object->requestkey
			);
			
			
			$bankCodeList = $momoObject->bankCodeList($data_momo);
			
			return $bankCodeList;
		}
	}
