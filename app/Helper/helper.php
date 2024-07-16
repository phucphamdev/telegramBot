<?php

	use App\Helper\Bank\Momo;
	use Symfony\Component\Process\Process;

	if (!function_exists('level')) {
		function level($level)
		{
			switch ($level) {
				case '0':
					return 'Người dùng';
					break;
				case '1';
					return 'Đại lý';
					break;
				case '2':
					return 'Quản trị viên';
					break;
				default:
					break;
			}
		}
	}

	if (!function_exists('threads')) {
		function threads(array $commands = [])
		{
			$extensions = $consoles = array();
			foreach ($commands as $console) {
				$command = array(
					PHP_BINARY,
					ARTISAN_BINARY
				);
				$explode = explode('|', $console);
				foreach ($explode as $item) $command[] = $item;
				$extensions[] = $extension = new Process($command);
				$extension->start();
			}
			while (true) {
				foreach ($extensions as $keys => $extension) {
					if (!$extension->isRunning() && !empty($extension->getOutput())) {
						$output = trim($extension->getOutput());
						$consoles[$keys] = json_decode($output);
						unset($extensions[$keys]);
					}
				}
				if (count($consoles) == count($commands)) break;
			}
			return $consoles;
		}
	}

	if (!function_exists('responseJson')) {
		function responseJson($data = [])
		{
			return response()->json($data, 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
		}
	}

	if (!function_exists('momo')) {
		function momo()
		{
			return new Momo;
		}
	}

	if (!function_exists('format_money')) {
		function format_money(int $int)
		{
			return str_replace(',', '.', number_format($int));
		}
	}

	if (!function_exists('ping')) {
		function ping($ipv4, $waitTimeoutInSeconds = 1)
		{
			if (preg_match("/(\d[\d.]+):(\d+)\b/", $ipv4, $match)) {
				if (@$fp = fsockopen($match[1], $match[2], $errCode, $errStr, $waitTimeoutInSeconds)) {
					fclose($fp);
					return true;
				}
			}
			return false;
		}
	}

	if (!function_exists('convert_phone')) {
		function convert_phone($phonenumber, $rev = 1)
		{
			if (substr($phonenumber, 0, 1) != '0') {
				$phonenumber = '0' . $phonenumber;
			}
			$CELL = array(
				'016966' => '03966',
				'0169' => '039',
				'0168' => '038',
				'0167' => '037',
				'0166' => '036',
				'0165' => '035',
				'0164' => '034',
				'0163' => '033',
				'0162' => '032',
				'0120' => '070',
				'0121' => '079',
				'0122' => '077',
				'0126' => '076',
				'0128' => '078',
				'0123' => '083',
				'0124' => '084',
				'0125' => '085',
				'0127' => '081',
				'0129' => '082',
				'01992' => '059',
				'01993' => '059',
				'01998' => '059',
				'01999' => '059',
				'0186' => '056',
				'0188' => '058'
			);

			if ($rev === 0) {
				$array = array();
				foreach ($CELL as $keys => $item) {
					$array[$item] = $keys;
				}
				$CELL = $array;
			}

			$phonenumber = str_replace(' ', '', $phonenumber);
			//2. Xóa các dấu chấm phân cách
			$phonenumber = str_replace('.', '', $phonenumber);
			//3. Xóa các dấu gạch nối phân cách
			$phonenumber = str_replace('-', '', $phonenumber);
			//4. Xóa dấu mở ngoặc đơn
			$phonenumber = str_replace('(', '', $phonenumber);
			//5. Xóa dấu đóng ngoặc đơn
			$phonenumber = str_replace(')', '', $phonenumber);
			//6. Xóa dấu +
			$phonenumber = str_replace('+', '', $phonenumber);
			//7. Chuyển 84 đầu thành 0
			if (substr($phonenumber, 0, 2) == '84') {
				$phonenumber = '0' . substr($phonenumber, 2, strlen($phonenumber) - 2);
			}
			foreach ($CELL as $key => $value) {
				//$prefixlen=strlen($key);
				if (strpos($phonenumber, $key) === 0) {
					$prefix = $key;
					$prefixlen = strlen($key);
					$phone = substr($phonenumber, $prefixlen, strlen($phonenumber) - $prefixlen);
					$prefix = str_replace($key, $value, $prefix);
					$phonenumber = $prefix . $phone;
					//$phonenumber=str_replace($key,$value,$phonenumber);
					break;
				}
			}

			// if(substr($phonenumber,0, 1) == '0'){
			//     $phonenumber = '84'.substr($phonenumber,1, strlen($phonenumber) - 1);
			// }
			return $phonenumber;
		}
	}

	if (!function_exists('get_ipaddress')) {
		function get_ipaddress($ipv4)
		{
			if (preg_match('/(\d[\d.]+):(\d+)\b/', $ipv4, $matches)) {
				return $matches[1];
			}
		}

		return false;
	}


