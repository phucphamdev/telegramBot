<?php
	return array(
		'' => array(
			'title' => 'Dashboard',
			'description' => '',
			'view' => 'index',
			'layout' => array(
				'page-title' => array(
					'description' => true,
					'breadcrumb' => false,
				),
			),
			'assets' => array(
				'custom' => array(
					'js' => array(
						'js/widgets.bundle.js',

					),
				),
				'vendors' => array('fullcalendar', 'amcharts', 'amcharts-maps'),
			),
		),

		'login' => array(
			'title' => 'Login',
			'assets' => array(
				'custom' => array(
					'js' => array(
						'js/custom/authentication/sign-in/general.js',
					),
				),
			),
			'layout' => array(
				'main' => array(
					'type' => 'blank', // Set blank layout
					'body' => array(
						'class' => theme()->isDarkMode() ? '' : 'bg-body',
					),
				),
			),
		),

		'register' => array(
			'title' => 'Register',
			'assets' => array(
				'custom' => array(
					'js' => array(
						'js/custom/authentication/sign-up/general.js',
					),
				),
			),
			'layout' => array(
				'main' => array(
					'type' => 'blank', // Set blank layout
					'body' => array(
						'class' => theme()->isDarkMode() ? '' : 'bg-body',
					),
				),
			),
		),
		'forgot-password' => array(
			'title' => 'Forgot Password',
			'assets' => array(
				'custom' => array(
					'js' => array(
						'js/custom/authentication/password-reset/password-reset.js',
					),
				),
			),
			'layout' => array(
				'main' => array(
					'type' => 'blank', // Set blank layout
					'body' => array(
						'class' => theme()->isDarkMode() ? '' : 'bg-body',
					),
				),
			),
		),

		'banks' => array(
			'title' => 'Banks Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'logsusers' => array(
			'title' => 'logsusers Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'bankusers' => array(
			'title' => 'bankusers Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'logusers' => array(
			'title' => 'logusers Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'mbbank' => array(
			'title' => 'MBBank Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'transactionstpbank' => array(
			'title' => 'MBBank Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'transactionmbbankhistorylist' => array(
			'title' => 'transactionmbbankhistorylist Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'acb' => array(
			'title' => 'ACB Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'acbtranfer' => array(
			'title' => 'acbtranfer Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'acbtranfer_nani88' => array(
			'title' => 'acbtranfer_nani88 Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'acbtranfer_nani88_hovanduong' => array(
			'title' => 'acbtranfer_nani88_hovanduong Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'acbbankcode' => array(
			'title' => 'acbbankcode Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'momo' => array(
			'title' => 'Momo Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'vpbank' => array(
			'title' => 'Vpbank Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'viettelpay' => array(
			'title' => 'Viettelpay Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'viettelpay' => array(
			'title' => 'Viettelpay Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'pending_recharge' => array(
			'title' => 'pending_recharge Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'cancel_recharge' => array(
			'title' => 'cancel_recharge Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'success_recharge' => array(
			'title' => 'success_recharge Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'success_withdraw' => array(
			'title' => 'success_withdraw Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'cancel_withdraw' => array(
			'title' => 'cancel_withdraw Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'pending_withdraw' => array(
			'title' => 'pending_withdraw Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'dashboard' => array(
			'title' => 'Dashboard Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'tpbank' => array(
			'title' => 'tpbank Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'vcb_historybank' => array(
			'title' => 'vcb_historybank Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'acb_historybank' => array(
			'title' => 'acb_historybank Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'mbbank_historybank' => array(
			'title' => 'mbbank_historybank Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'tpbank_historybank' => array(
			'title' => 'mbbank_historybank Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'partnerscustomercategory' => array(
			'title' => 'partnerscustomercategory Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'partnerscustomer' => array(
			'title' => 'partnerscustomer Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'partnerscategory' => array(
			'title' => 'partnerscategory Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'partners' => array(
			'title' => 'partners Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'partners.document' => array(
			'title' => 'partners Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'partnersbanklist' => array(
			'title' => 'partners partnersbanklist Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',
					),
				),
			),
		),

		'transactionsvietcombank' => array(
			'title' => 'transactions vietcombanks Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),


		'withdraw' => array(
			'title' => 'withdraw Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'recharge' => array(
			'title' => 'recharge Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'recharge_filter' => array(
			'title' => 'recharge filter',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',
						'js/scripts.bundle.js',

					),
				),
			),
		),

		'recharge_admin_filter' => array(
			'title' => 'recharge filter',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',
						'js/scripts.bundle.js',

					),
				),
			),
		),

		'recharge_success' => array(
			'title' => 'recharge Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'withdraw_success' => array(
			'title' => 'recharge Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'withdraw_submit' => array(
			'title' => 'Withdraw submit Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'recharge_callback' => array(
			'title' => 'recharge callback Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'withdraw_callback' => array(
			'title' => 'withdraw Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'historybank' => array(
			'title' => 'historybank title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),


		'historyzalopay' => array(
			'title' => 'historyzalopay Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',


					),
				),
			),
		),

		'historymomo' => array(
			'title' => 'recharge Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'recharge_cancel' => array(
			'title' => 'recharge_cancel Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'historyviettelpay' => array(
			'title' => 'historyviettelpay Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'loginmanage' => array(
			'title' => 'loginmanage Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'errormanage' => array(
			'title' => 'loginmanage Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'bankscode' => array(
			'title' => 'bankscode Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'cronjobsetting' => array(
			'title' => 'cronjobsetting Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'cronjob' => array(
			'title' => 'cronjob Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'rolespermissionsview' => array(
			'title' => 'loginmanage Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'momotranfer' => array(
			'title' => 'loginmanage Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'proxy' => array(
			'title' => 'proxy Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'generalmanage' => array(
			'title' => 'loginmanage Title',
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'log' => array(
			'audit' => array(
				'title' => 'log Title',
				'assets' => array(
					'custom' => array(
						'css' => array(
							'plugins/custom/datatables/datatables.bundle.css',
						),
						'js' => array(
							'plugins/custom/datatables/datatables.bundle.js',

						),
					),
				),
			),
			'system' => array(
				'title' => 'System Log',
				'assets' => array(
					'custom' => array(
						'css' => array(
							'plugins/custom/datatables/datatables.bundle.css',
						),
						'js' => array(
							'plugins/custom/datatables/datatables.bundle.js',

						),
					),
				),
			),
		),

		'error' => array(
			'error-404' => array(
				'title' => 'Error 404',
			),
			'error-500' => array(
				'title' => 'Error 500',
			),
		),

		'account' => array(
			'overview' => array(
				'title' => 'Account Overview',
				'view' => 'account/overview/overview',
				'assets' => array(
					'custom' => array(
						'js' => array(
							'js/custom/widgets.js',
						),
					),
				),
			),

			'settings' => array(
				'title' => 'Account Settings',
				'assets' => array(
					'custom' => array(
						'js' => array(
							'js/custom/account/settings/profile-details.js',
							'js/custom/account/settings/signin-methods.js',
							'js/custom/modals/two-factor-authentication.js',
						),
					),
				),
			),
		),

		'users.loadUser' => array(
			'title' => 'loadUser Title',
			'*' => array(
				'title' => 'Show User',

				'edit' => array(
					'title' => 'Edit User',
				),
			),
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'user' => array(
			'title' => 'users Title',
			'*' => array(
				'title' => 'Show User',

				'edit' => array(
					'title' => 'Edit User',
				),
			),
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		'users' => array(
			'title' => 'users Title',
			'*' => array(
				'title' => 'Show User',

				'edit' => array(
					'title' => 'Edit User',
				),
			),
			'assets' => array(
				'custom' => array(
					'css' => array(
						'plugins/custom/datatables/datatables.bundle.css',
					),
					'js' => array(
						'plugins/custom/datatables/datatables.bundle.js',

					),
				),
			),
		),

		// Documentation pages
	//		'documentation' => array(
	//			'*' => array(
	//				'assets' => array(
	//					'vendors' => array('prismjs'),
	//					'custom' => array(
	//						'js' => array(
	//							'js/custom/documentation/documentation.js',
	//						),
	//					),
	//				),
	//
	//				'layout' => array(
	//					'base' => 'docs', // Set base layout: default|docs
	//
	//					// Content
	//					'content' => array(
	//						'width' => 'fixed', // Set fixed|fluid to change width type
	//						'layout' => 'documentation'  // Set content type
	//					),
	//				),
	//			),
	//
	//			'getting-started' => array(
	//				'overview' => array(
	//					'title' => 'Overview',
	//					'description' => '',
	//					'view' => 'documentation/getting-started/overview',
	//				),
	//
	//				'build' => array(
	//					'title' => 'Gulp',
	//					'description' => '',
	//					'view' => 'documentation/getting-started/build/build',
	//				),
	//
	//				'multi-demo' => array(
	//					'overview' => array(
	//						'title' => 'Overview',
	//						'description' => '',
	//						'view' => 'documentation/getting-started/multi-demo/overview',
	//					),
	//					'build' => array(
	//						'title' => 'Multi-demo Build',
	//						'description' => '',
	//						'view' => 'documentation/getting-started/multi-demo/build',
	//					),
	//				),
	//
	//				'file-structure' => array(
	//					'title' => 'File Structure',
	//					'description' => '',
	//					'view' => 'documentation/getting-started/file-structure',
	//				),
	//
	//				'customization' => array(
	//					'sass' => array(
	//						'title' => 'SASS',
	//						'description' => '',
	//						'view' => 'documentation/getting-started/customization/sass',
	//					),
	//					'javascript' => array(
	//						'title' => 'Javascript',
	//						'description' => '',
	//						'view' => 'documentation/getting-started/customization/javascript',
	//					),
	//				),
	//
	//				'dark-mode' => array(
	//					'title' => 'Dark Mode Version',
	//					'view' => 'documentation/getting-started/dark-mode',
	//				),
	//
	//				'rtl' => array(
	//					'title' => 'RTL Version',
	//					'view' => 'documentation/getting-started/rtl',
	//				),
	//
	//				'troubleshoot' => array(
	//					'title' => 'Troubleshoot',
	//					'view' => 'documentation/getting-started/troubleshoot',
	//				),
	//
	//				'changelog' => array(
	//					'title' => 'Changelog',
	//					'description' => 'version and update info',
	//					'view' => 'documentation/getting-started/changelog/changelog',
	//				),
	//
	//				'updates' => array(
	//					'title' => 'Updates',
	//					'description' => 'components preview and usage',
	//					'view' => 'documentation/getting-started/updates',
	//				),
	//
	//				'references' => array(
	//					'title' => 'References',
	//					'description' => '',
	//					'view' => 'documentation/getting-started/references',
	//				),
	//			),
	//
	//			'general' => array(
	//				'datatables' => array(
	//					'overview' => array(
	//						'title' => 'Overview',
	//						'description' => 'plugin overview',
	//						'view' => 'documentation/general/datatables/overview/overview',
	//					),
	//				),
	//				'remove-demos' => array(
	//					'title' => 'Remove Demos',
	//					'description' => 'How to remove unused demos',
	//					'view' => 'documentation/general/remove-demos/index',
	//				),
	//			),
	//
	//			'configuration' => array(
	//				'general' => array(
	//					'title' => 'General Configuration',
	//					'description' => '',
	//					'view' => 'documentation/configuration/general',
	//				),
	//				'menu' => array(
	//					'title' => 'Menu Configuration',
	//					'description' => '',
	//					'view' => 'documentation/configuration/menu',
	//				),
	//				'page' => array(
	//					'title' => 'Page Configuration',
	//					'description' => '',
	//					'view' => 'documentation/configuration/page',
	//				),
	//				'npm-plugins' => array(
	//					'title' => 'Add NPM Plugin',
	//					'description' => 'Add new NPM plugins and integrate within webpack mix',
	//					'view' => 'documentation/configuration/npm-plugins',
	//				),
	//			),
	//		),
	);
