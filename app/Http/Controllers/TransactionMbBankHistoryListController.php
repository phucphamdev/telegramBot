<?php
	
	namespace App\Http\Controllers;
	
	use App\DataTables\transactionMbBankHistoryListDataTable;
	use App\Models\Recharge;
	use App\Models\transactionMbBankHistoryList;
	use App\Models\User;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;
	
	class TransactionMbBankHistoryListController extends Controller
	{
		public function index(transactionMbBankHistoryListDataTable $dataTable)
		{
			$user_role = Auth::user()->role();
			$this->updateRecharge();
			
			if ($user_role == 'admin') {
				
				return $dataTable->render('pages.mbbank.transactionmbbankhistorylist.index');
			}
			
			if ($user_role == 'partner')
			{
				return $dataTable->render('users.mbbank.transactionmbbankhistorylist.index');
			}
		}
		
		public function updateRecharge()
		{
			$listRe = Recharge::where('trang_thai','!=','success')->get();
			
			foreach ($listRe as $re)
			{
				if(!empty($re->text))
				{
					$check_Transaction = TransactionMbBankHistoryList::where('description', 'like', '% '. $re->text .' %')->get();
					
					if(count($check_Transaction) == 1)
					{
						// update Recharge
						$arr['trang_thai'] = 'confirm';
						$arr['comment_api'] = $check_Transaction[0]->description;
						$object = Recharge::where('id', $re->id)->first();
						$object->update($arr);
						$object->save();
						
					}
					
					if (count($check_Transaction) >1)
					{
						$comment_api = '';
						foreach ($check_Transaction as $item_check)
						{
							$comment_api = $comment_api . $item_check->description .'==//==';
						}
						
						$arr['trang_thai'] = 'confirm';
						$arr['comment_api'] = $comment_api;
						$object = Recharge::where('id', $re->id)->first();
						$object->update($arr);
						$object->save();
					}
				}
			}
			
			
		}
		
		public function create()
		{
			//
		}
		
		public function store(Request $request)
		{
			//
		}
		
		public function show(transactionMbBankHistoryList $transactionMbBankHistoryList)
		{
			//
		}
		
		public function edit(transactionMbBankHistoryList $transactionMbBankHistoryList)
		{
			//
		}
		
		public function update(Request $request, transactionMbBankHistoryList $transactionMbBankHistoryList)
		{
			//
		}
		
		public function destroy(transactionMbBankHistoryList $transactionMbBankHistoryList)
		{
			//
		}
	}
