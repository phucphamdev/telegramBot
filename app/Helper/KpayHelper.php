<?php

namespace App\Helper;

use App\Models\Acbtranfer;
use App\Models\Banks;
use App\Models\BankUsers;
use App\Models\Recharge;
use App\Models\transactionsVietcombank;
use App\Models\User;
use App\Models\Withdraw;
use Carbon\Carbon;
use Database\Seeders\transactionsVietcombankSeeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KpayHelper
{
	public static function get_total_days()
	{
		$date = Carbon::now()->timezone('Asia/Ho_Chi_Minh');
		$date->setTimezone('+7');
		$created_at = $date->format('Y-m-d h:m:s'); //2023-04-14 11:56:08

		$data = Recharge::select("*")
			->where('trang_thai', 'success')
			->whereDate('created_at', Carbon::today())
			->get()->toArray();
		$total = count($data) ?? 0;

		return $total;
	}

	public static function get_total_week()
	{
		$date = Carbon::now()->timezone('Asia/Ho_Chi_Minh');
		$date->setTimezone('+7');
		$created_at = $date->format('Y-m-d h:m:s'); //2023-04-14 11:56:08

		$data = Recharge::select("*")
			->where('trang_thai', 'success')
			->whereDate('created_at', '>=', Carbon::now()->subDays(7)->toDateTimeString())
			->get()->toArray();
		$total = count($data) ?? 0;

		return $total;
	}

	public static function get_total_month()
	{
		$date = Carbon::now()->timezone('Asia/Ho_Chi_Minh');
		$date->setTimezone('+7');
		$created_at = $date->format('Y-m-d h:m:s'); //2023-04-14 11:56:08

		$data = Recharge::select("*")
			->where('trang_thai', 'success')
			->whereDate('created_at', '>=', Carbon::now()->subDays(30)->toDateTimeString())
			->get()->toArray();
		$total = count($data) ?? 0;

		return $total;
	}

	public static function get_sum_days()
	{
		$date = Carbon::now()->timezone('Asia/Ho_Chi_Minh');
		$date->setTimezone('+7');
		$created_at = $date->format('Y-m-d h:m:s'); //2023-04-14 11:56:08

		$data = Recharge::select("*")
			->where('trang_thai', 'success')
			->whereDate('created_at', Carbon::today())
			->get()->toArray();
		$sum = 0;

		foreach ($data as $key => $val) {
			$sum += $val['amount'];
		}

		return str_replace(',', '.', number_format($sum));
	}

	public static function get_sum_week()
	{
		$date = Carbon::now()->timezone('Asia/Ho_Chi_Minh');
		$date->setTimezone('+7');
		$created_at = $date->format('Y-m-d h:m:s'); //2023-04-14 11:56:08

		$data = Recharge::select("*")
			->where('trang_thai', 'success')
			->whereDate('created_at', '>=', Carbon::now()->subDays(7)->toDateTimeString())
			->get()->toArray();
		$sum = 0;

		foreach ($data as $key => $val) {
			$sum += $val['amount'];
		}

		return str_replace(',', '.', number_format($sum));
	}

	public static function get_sum_month()
	{
		$date = Carbon::now()->timezone('Asia/Ho_Chi_Minh');
		$date->setTimezone('+7');
		$created_at = $date->format('Y-m-d h:m:s'); //2023-04-14 11:56:08

		$data = Recharge::select("*")
			->where('trang_thai', 'success')
			->whereDate('created_at', '>=', Carbon::now()->subDays(30)->toDateTimeString())
			->get()->toArray();
		$sum = 0;

		foreach ($data as $key => $val) {
			$sum += $val['amount'];
		}

		return str_replace(',', '.', number_format($sum));
	}

	public static function count_partners()
	{
		$data = User::where('role', 'partner')
			->where('trang_thai', 'active')
			->get()->toArray();

		return count($data) ?? 0;
	}

	public static function count_admin()
	{
		$data = User::where('role', 'admin')
			->where('trang_thai', 'active')
			->get()->toArray();

		return count($data) ?? 0;
	}

	public static function list_admin()
	{
		$data = User::where('role', 'admin')
			->where('trang_thai', 'active')
			->get()->toArray();
		$list = array();

		foreach ($data as $key => $val) {
			$tem = array();
			$tem['name'] = $val['first_name'];
			$tem['UUID'] = $val['UUID'];
			$tem['so_du'] = str_replace(',', '.', number_format($val['so_du']));
			$tem['email'] = $val['email'];
			$tem['role'] = $val['role'];
			$tem['created_at'] = date('d-m-Y h:m:s', strtotime($val['created_at']));
			$tem['updated_at'] = date('d-m-Y h:m:s', strtotime($val['updated_at']));

			$tem['id'] = $val['id'];

			$list[] = $tem;
		}

		return $list;
	}

	public static function list_partners()
	{
		$data = User::where('role', 'partner')
			->where('trang_thai', 'active')
			->get()->toArray();
		$list = array();

		foreach ($data as $key => $val) {
			$tem = array();
			$tem['name'] = $val['first_name'];
			$tem['UUID'] = $val['UUID'];
			$tem['so_du'] = str_replace(',', '.', number_format($val['so_du']));
			$tem['email'] = $val['email'];
			$tem['role'] = $val['role'];
			$tem['created_at'] = date('d-m-Y h:m:s', strtotime($val['created_at']));
			$tem['updated_at'] = date('d-m-Y h:m:s', strtotime($val['updated_at']));

			$tem['id'] = $val['id'];

			$list[] = $tem;
		}

		return $list;
	}

	public static function cron_vcb()
	{
		$data = transactionsVietcombank::whereDate('created_at', Carbon::today())
			->get()->toArray();

		$list = array();

		foreach ($data as $key => $val) {
			$tem = array();
			$tem['id'] = $val['id'];
			$tem['TransactionDate'] = $val['TransactionDate'];
			$tem['Reference'] = $val['Reference'];
			$tem['Description'] = $val['Description'];
			$tem['Amount'] = $val['Amount'];
			$tem['created_at'] = date('d-m-Y h:m:s', strtotime($val['created_at']));
			$tem['updated_at'] = date('d-m-Y h:m:s', strtotime($val['updated_at']));

			$list[] = $tem;
		}

		return $list;
	}

	public static function cron_vcb_week()
	{
		$data = transactionsVietcombank::whereDate('created_at', '>=', Carbon::now()->subDays(7)->toDateTimeString())
			->get()->toArray();

		$list = array();

		foreach ($data as $key => $val) {
			$tem = array();
			$tem['id'] = $val['id'];
			$tem['TransactionDate'] = $val['TransactionDate'];
			$tem['Reference'] = $val['Reference'];
			$tem['Description'] = $val['Description'];
			$tem['Amount'] = $val['Amount'];
			$tem['created_at'] = date('d-m-Y h:m:s', strtotime($val['created_at']));
			$tem['updated_at'] = date('d-m-Y h:m:s', strtotime($val['updated_at']));

			$list[] = $tem;
		}

		return $list;
	}

	public static function cron_vcb_month()
	{
		$data = transactionsVietcombank::whereDate('created_at', '>=', Carbon::now()->subDays(30)->toDateTimeString())
			->get()->toArray();

		$list = array();

		foreach ($data as $key => $val) {
			$tem = array();
			$tem['id'] = $val['id'];
			$tem['TransactionDate'] = $val['TransactionDate'];
			$tem['Reference'] = $val['Reference'];
			$tem['Description'] = $val['Description'];
			$tem['Amount'] = $val['Amount'];
			$tem['created_at'] = date('d-m-Y h:m:s', strtotime($val['created_at']));
			$tem['updated_at'] = date('d-m-Y h:m:s', strtotime($val['updated_at']));

			$list[] = $tem;
		}

		return $list;
	}

	public static function cron_count_vcb()
	{
		$data = transactionsVietcombank::whereDate('created_at', Carbon::today())
			->get()->toArray();

		return count($data) ?? 0;
	}

	public static function cron_acb()
	{
		$data = DB::table('acbtranfers')->whereDate('created_at', Carbon::today())
			->get()->toArray();

		$list = array();

		foreach ($data as $key => $val) {
			$tem = array();
			$tem['transactionNumber'] = $val->transactionNumber;
			$tem['receiverName'] = $val->receiverName;
			$tem['description'] = $val->description;
			$tem['amount'] = $val->amount;
			$tem['created_at'] = date('d-m-Y h:m:s', strtotime($val->created_at));
			$tem['updated_at'] = date('d-m-Y h:m:s', strtotime($val->updated_at));

			$list[] = $tem;
		}

		return $list;
	}

	public static function cron_acb_week()
	{
		$data = DB::table('acbtranfers')->whereDate('created_at', '>=', Carbon::now()->subDays(30)->toDateTimeString())
			->get()->toArray();

		$list = array();

		foreach ($data as $key => $val) {

			$tem = array();
			$tem['transactionNumber'] = $val->transactionNumber;
			$tem['receiverName'] = $val->receiverName;
			$tem['description'] = $val->description;
			$tem['amount'] = $val->amount;
			$tem['created_at'] = date('d-m-Y h:m:s', strtotime($val->created_at));
			$tem['updated_at'] = date('d-m-Y h:m:s', strtotime($val->updated_at));

			$list[] = $tem;
		}

		return $list;
	}

	public static function cron_acb_month()
	{
		$data = DB::table('acbtranfers')->whereDate('created_at', '>=', Carbon::now()->subDays(30)->toDateTimeString())
			->get()->toArray();

		$list = array();

		foreach ($data as $key => $val) {
			$tem = array();
			$tem['transactionNumber'] = $val->transactionNumber;
			$tem['receiverName'] = $val->receiverName;
			$tem['description'] = $val->description;
			$tem['amount'] = $val->amount;
			$tem['created_at'] = date('d-m-Y h:m:s', strtotime($val->created_at));
			$tem['updated_at'] = date('d-m-Y h:m:s', strtotime($val->updated_at));

			$list[] = $tem;
		}

		return $list;
	}

	public static function cron_count_acb()
	{
		$data = Acbtranfer::whereDate('created_at', Carbon::today())
			->get()->toArray();

		return count($data) ?? 0;
	}

	public static function getBankUser($id)
	{
		$data = BankUsers::where('id_partners', $id)
			->get()->toArray();
		$list = array();
		foreach ($data as $key => $val) {
			$tem = array();
			$tem['id'] = $val['id'];
			$tem['full_name'] = $val['full_name'];
			$tem['number1'] = $val['number1'];
			$tem['run'] = $val['run'];
			$tem['username'] = $val['username'];
			$tem['password'] = $val['password'];
			$tem['trang_thai'] = $val['trang_thai'];
			$tem['bankcode'] = '';
			foreach(DB::table('bankcodes')->get() as $bank)
			{
				if($val['bankcode'] == $bank->code)
				{
					$tem['bankcode'] = $bank->name;
				}
			}
			$tem['link_qrcode'] = $val['link_qrcode'];
			$tem['branch'] = $val['branch'];
			$tem['created_at'] = date('d-m-Y h:m:s', strtotime($val['created_at']));
			$tem['updated_at'] = date('d-m-Y h:m:s', strtotime($val['updated_at']));

			$list[] = $tem;
		}

		return $list;
	}

	public static function getBanks($id)
	{
		$data = Banks::where('id_partners', $id)
			->get()->toArray();
		$list = array();
		foreach ($data as $key => $val) {
			$tem = array();
			$tem['id'] = $val['id'];
			$tem['full_name'] = $val['full_name'];
			$tem['number1'] = $val['number1'];
			$tem['run'] = $val['run'];
			$tem['username'] = $val['username'];
			$tem['password'] = $val['password'];
			$tem['trang_thai'] = $val['trang_thai'];
			$tem['bankcode'] = '';
			foreach(DB::table('bankcodes')->get() as $bank)
			{
				if($val['bankcode'] == $bank->code)
				{
					$tem['bankcode'] = $bank->name;
				}
			}
			$tem['link_qrcode'] = $val['link_qrcode'];
			$tem['branch'] = $val['branch'];
			$tem['created_at'] = date('d-m-Y h:m:s', strtotime($val['created_at']));
			$tem['updated_at'] = date('d-m-Y h:m:s', strtotime($val['updated_at']));

			$list[] = $tem;
		}

		return $list;
	}

	public static function count_recharge($id)
	{

		$data = Recharge::select("*")
			->where('id_partners', $id)
			->get()->toArray();
		$total = count($data) ?? 0;

		return $total;
	}

	public static function count_withdraw($access_token)
	{
		$data = Withdraw::where('accessToken', $access_token)->get()->toArray();

		return count($data) ?? 0;
	}

	public static function get_Logs_today($id_user)
	{
		$data = DB::table('logs_profile')
			->where('id_user', $id_user)
			->orderBy('id','desc')
			->get()->toArray();

		$list = array();
		foreach ($data as  $val) {
			$tem = array();
			$tem['id'] = $val->id;
			$tem['id_user'] = $val->id_user;
			$tem['type'] = $val->type;
			$tem['old'] = json_decode($val->old);
			$tem['new'] = json_decode($val->new);
			$tem['created_at'] = date('H:m', strtotime($val->created_at));
			$tem['created_at_2'] = date('d-m-Y H:m:s', strtotime($val->created_at));
			$tem['updated_at'] = date('d-m-Y H:m:s', strtotime($val->updated_at));

			$list[] = $tem;
		}

		return $list;
	}

	public static function get_Logs_today_limit($id_user)
	{
		$data = DB::table('logs_profile')
			->where('id_user', $id_user)
			->take(5)
			->orderBy('id','desc')
			->get()->toArray();

		$list = array();
		foreach ($data as  $val) {
			$tem = array();
			$tem['id'] = $val->id;
			$tem['id_user'] = $val->id_user;
			$tem['type'] = $val->type;
			$tem['old'] = json_decode($val->old);
			$tem['new'] = json_decode($val->new);
			$tem['created_at'] = date('H:m', strtotime($val->created_at));
			$tem['created_at_2'] = date('d-m-Y H:m:s', strtotime($val->created_at));
			$tem['updated_at'] = date('d-m-Y H:m:s', strtotime($val->updated_at));

			$list[] = $tem;
		}

		return $list;
	}


	public static function get_Logs_week($id_user)
	{
		$data = DB::table('logs_profile')
			->where('id_user', $id_user)
			->whereDate('created_at', '>=', Carbon::now()->subDays(7)->toDateTimeString())
			->orderBy('id','desc')
			->get()->toArray();

		$list = array();
		foreach ($data as  $val) {
			$tem = array();
			$tem['id'] = $val->id;
			$tem['id_user'] = $val->id_user;
			$tem['type'] = $val->type;
			$tem['old'] = json_decode($val->old);
			$tem['new'] = json_decode($val->new);
			$tem['created_at'] = date('H:m', strtotime($val->created_at));
			$tem['created_at_2'] = date('d-m-Y H:m:s', strtotime($val->created_at));
			$tem['updated_at'] = date('d-m-Y H:m:s', strtotime($val->updated_at));

			$list[] = $tem;
		}

		return $list;
	}

	public static function get_Logs_month($id_user)
	{
		$data = DB::table('logs_profile')
			->where('id_user', $id_user)
			->whereDate('created_at', '>=', Carbon::now()->subDays(30)->toDateTimeString())
			->orderBy('id','desc')
			->get()->toArray();

		$list = array();
		foreach ($data as  $val) {
			$tem = array();
			$tem['id'] = $val->id;
			$tem['id_user'] = $val->id_user;
			$tem['type'] = $val->type;
			$tem['old'] = json_decode($val->old);
			$tem['new'] = json_decode($val->new);
			$tem['created_at'] = date('H:m', strtotime($val->created_at));
			$tem['created_at_2'] = date('d-m-Y H:m:s', strtotime($val->created_at));
			$tem['updated_at'] = date('d-m-Y H:m:s', strtotime($val->updated_at));

			$list[] = $tem;
		}

		return $list;
	}



}
