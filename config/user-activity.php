<?php

return [
    'activated'        => true, // active/inactive all logging
	'middleware'       => ['web', 'auth'],
    'route_path'       => 'logs/user-activity',
    'admin_panel_path' => 'logs/dashboard-activity',
    'delete_limit'     => 60, // default 7 days

    'model' => array(
        'user' => "App\Models\User",
        'withdraw' => "App\Models\Withdraw",
        'recharge' => "App\Models\Recharge",
        'Acbank' => "App\Models\Acbank",
        'Acbbankcode' => "App\Models\Acbbankcode",
        'Acbtranfer' => "App\Models\Acbtranfer",
        'Banks' => "App\Models\Banks",
        'Bankscode' => "App\Models\Bankscode",
        'BankUsers' => "App\Models\BankUsers",
        'CronJob' => "App\Models\CronJob",
        'Cronjobsetting' => "App\Models\Cronjobsetting",
        'HistoryBank' => "App\Models\HistoryBank",
        'HistoryMomo' => "App\Models\HistoryMomo",
        'HistoryViettelPay' => "App\Models\HistoryViettelPay",
        'HistoryZaloPay' => "App\Models\HistoryZaloPay",
        'Momo' => "App\Models\Momo",
        'MomoTranfer' => "App\Models\MomoTranfer",
        'Partners' => "App\Models\Partners",
        'System' => "App\Models\System",
        'TPBank' => "App\Models\TPBank",
        'transactionMbBankHistoryList' => "App\Models\transactionMbBankHistoryList",
        'transactionsVietcombank' => "App\Models\transactionsVietcombank",
        'Viettelpay' => "App\Models\Viettelpay",
    ),

    'log_events' => [
        'on_create'     => true,
        'on_edit'       => true,
        'on_delete'     => true,
        'on_login'      => true,
        'on_lockout'    => true
    ]
];
