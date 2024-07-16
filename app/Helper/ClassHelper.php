<?php
	namespace App\Helper;
	
	use Crypt_RSA;
	
	class Helper
	{
		
		protected function rsa_encrypt($loadKey, $plaintext)
		{
			$rsa = new Crypt_RSA();
			$rsa->setEncryptionMode(CRYPT_RSA_ENCRYPTION_PKCS1);
			$rsa->loadKey($loadKey);
			return base64_encode($rsa->encrypt($plaintext));
		}
		
		protected function get_TOKEN()
		{
			return $this->generateRandom(22) . ':' . $this->generateRandom(9) . '-' . $this->generateRandom(20) . '-' . $this->generateRandom(12) . '-' . $this->generateRandom(7) . '-' . $this->generateRandom(7) . '-' . $this->generateRandom(53) . '-' . $this->generateRandom(9) . '_' . $this->generateRandom(11) . '-' . $this->generateRandom(4);
		}
		
		protected function generateRandom($length = 20)
		{
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			return $randomString;
		}
		
		protected function get_SECUREID($length = 17)
		{
			$characters = '0123456789abcdef';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			return $randomString;
		}
		
		public function generateImei()
		{
			return $this->generateRandomString(8) . '-' . $this->generateRandomString(4) . '-' . $this->generateRandomString(4) . '-' . $this->generateRandomString(4) . '-' . $this->generateRandomString(12);
		}
		
		protected function generateRandomString($length = 20)
		{
			$characters = '0123456789abcdef';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			return $randomString;
		}
		
		protected function get_microtime()
		{
			return round(microtime(true) * 1000);
		}
		
		protected function phone($phonenumber)
		{
			if (substr($phonenumber, 0, 1) != '0') {
				if (substr($phonenumber, 0, 2) != '84') {
					return '0' . $phonenumber;
				}
			}
			return $phonenumber;
		}
		
	}

?>
