<?php

return array(
	// Documentation menu
	'documentation' => array(
		// Getting Started
		array(
			'heading' => 'Getting Started',
		),

		// Overview
		array(
			'title' => 'Overview',
			'path' => 'documentation/getting-started/overview',
			'role' => ['admin'],
//				 'permission' => [],
		),

		// Build
		array(
			'title' => 'Build',
			'path' => 'documentation/getting-started/build',
		),

		array(
			'title' => 'Multi-demo',
			'attributes' => array("data-kt-menu-trigger" => "click"),
			'classes' => array('item' => 'menu-accordion'),
			'sub' => array(
				'class' => 'menu-sub-accordion',
				'items' => array(
					array(
						'title' => 'Overview',
						'path' => 'documentation/getting-started/multi-demo/overview',
						'bullet' => '<span class="bullet bullet-dot"></span>',
					),
					array(
						'title' => 'Build',
						'path' => 'documentation/getting-started/multi-demo/build',
						'bullet' => '<span class="bullet bullet-dot"></span>',
					),
				),
			),
		),

		// File Structure
		array(
			'title' => 'File Structure',
			'path' => 'documentation/getting-started/file-structure',
		),

		// Dark skin
		array(
			'title' => 'Dark Mode Version',
			'path' => 'documentation/getting-started/dark-mode',
		),


		// Troubleshoot
		array(
			'title' => 'Troubleshoot',
			'path' => 'documentation/getting-started/troubleshoot',
		),


		// References
		array(
			'title' => 'References',
			'path' => 'documentation/getting-started/references',
		),


		// Separator
		array(
			'custom' => '<div class="h-30px"></div>',
		),

		// Configuration
		array(
			'heading' => 'Configuration',
		),

		// General
		array(
			'title' => 'General',
			'path' => 'documentation/configuration/general',
		),

		// Menu
		array(
			'title' => 'Menu',
			'path' => 'documentation/configuration/menu',
		),

		// Page
		array(
			'title' => 'Page',
			'path' => 'documentation/configuration/page',
		),

		// Page
		array(
			'title' => 'Add NPM Plugin',
			'path' => 'documentation/configuration/npm-plugins',
		),


		// Separator
		array(
			'custom' => '<div class="h-30px"></div>',
		),

		// General
		array(
			'heading' => 'General',
		),

		// DataTables
		array(
			'title' => 'DataTables',
			'classes' => array('item' => 'menu-accordion'),
			'attributes' => array("data-kt-menu-trigger" => "click"),
			'sub' => array(
				'class' => 'menu-sub-accordion',
				'items' => array(
					array(
						'title' => 'Overview',
						'path' => 'documentation/general/datatables/overview',
						'bullet' => '<span class="bullet bullet-dot"></span>',
					),
				),
			),
		),

		// Remove demos
		array(
			'title' => 'Remove Demos',
			'path' => 'documentation/general/remove-demos',
		),


		// Separator
		array(
			'custom' => '<div class="h-30px"></div>',
		),

		// HTML Theme
		array(
			'heading' => 'HTML Theme',
		),

		array(
			'title' => 'Components',
			'path' => '#',
		),

		array(
			'title' => 'Documentation',
			'path' => '#',
		),
	),

	// Main menu
	'main' => array(


		array(
			'title' => 'Trang Chủ',
			'icon' => array(
				'svg' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen025.svg", "svg-icon-2"),
				'font' => '<i class="bi bi-layers fs-3"></i>',
			),
			'classes' => array('item' => 'menu-accordion'),
			'attributes' => array("data-kt-menu-trigger" => "click"),
			'sub' => array(
				'class' => 'menu-sub-accordion',
				'items' => array(
					array(
						'title' => 'Trang Chủ',
						'path' => '',
						'bullet' => '<span class="bullet bullet-dot"></span>',
					),
					array(
						'title' => 'Giao Dịch',
						'path' => 'dashboard',
						'role' => 'admin',
						'bullet' => '<span class="bullet bullet-dot"></span>',
					),
					array(
						'title' => 'Mã Code NH',
						'path' => 'bankscode',
						'role' => 'admin',
						'bullet' => '<span class="bullet bullet-dot"></span>',
					),
					array(
						'title' => 'Người Dùng',
						'path' => 'tracking/users',
						'role' => 'admin',
						'bullet' => '<span class="bullet bullet-dot"></span>',
					)
				),
			),
		),

//		array(
//			'title' => 'Tracking',
//			'role' => 'admin',
//			'icon' => array(
//				'svg' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen025.svg", "svg-icon-2"),
//				'font' => '<i class="bi bi-layers fs-3"></i>',
//			),
//			'classes' => array('item' => 'menu-accordion'),
//			'attributes' => array(
//				"data-kt-menu-trigger" => "click",
//			),
//			'sub' => array(
//				'class' => 'menu-sub-accordion menu-active-bg',
//				'items' => array(
//
//
////					array(
////						'title' => 'Settings',
////						'path' => 'tracking/settings',
////						'role' => 'admin',
////						'bullet' => '<span class="bullet bullet-dot"></span>',
////					),
////					array(
////						'title' => 'Cron Job',
////						'path' => 'tracking/cronjob',
////						'role' => 'admin',
////						'bullet' => '<span class="bullet bullet-dot"></span>',
////					),
////					array(
////						'title' => 'Banks',
////						'path' => 'tracking/banks',
////						'role' => 'admin',
////						'bullet' => '<span class="bullet bullet-dot"></span>',
////					),
//
//				)
//			),
//		),

		array(
			'title' => 'Thống Kê',
			'icon' => array(
				'svg' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen025.svg", "svg-icon-2"),
				'font' => '<i class="bi bi-layers fs-3"></i>',
			),
			'classes' => array('item' => 'menu-accordion'),
			'attributes' => array(
				"data-kt-menu-trigger" => "click",
			),
			'sub' => array(
				'class' => 'menu-sub-accordion menu-active-bg',
				'items' => array(
					array(
						'title' => 'Nạp Rút',
						'bullet' => '<span class="bullet bullet-dot"></span>',
						'attributes' => array(
							"data-kt-menu-trigger" => "click",
						),
						'sub' => array(
							'class' => 'menu-sub-accordion menu-active-bg',
							'items' => array(
								array(
									'title' => 'Tất Cả ',
									'path' => 'recharge_filter',
									'bullet' => '<span class="bullet bullet-dot"></span>',
								),array(
									'title' => 'Filter Admin',
									'role' => 'admin',
									'path' => 'recharge_admin_filter',
									'bullet' => '<span class="bullet bullet-dot"></span>',
								)
							)
						),
					),

				)
			),
		),

		array(
			'title' => 'Yêu Cầu',
			'icon' => array(
				'svg' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen025.svg", "svg-icon-2"),
				'font' => '<i class="bi bi-layers fs-3"></i>',
			),
			'classes' => array('item' => 'menu-accordion'),
			'attributes' => array(
				"data-kt-menu-trigger" => "click",
			),
			'sub' => array(
				'class' => 'menu-sub-accordion menu-active-bg',
				'items' => array(
					array(
						'title' => 'Nạp Tiền ',
						'bullet' => '<span class="bullet bullet-dot"></span>',
						'attributes' => array(
							"data-kt-menu-trigger" => "click",
						),
						'sub' => array(
							'class' => 'menu-sub-accordion menu-active-bg',
							'items' => array(
								array(
									'title' => 'Tất Cả ',
									'path' => 'recharge',
									'bullet' => '<span class="bullet bullet-dot"></span>',
								),
								array(
									'title' => 'Chờ ',
									'path' => 'pending_recharge',
									'bullet' => '<span class="bullet bullet-dot"></span>',
								),
								array(
									'title' => 'Từ Chối',
									'path' => 'cancel_recharge',
									'bullet' => '<span class="bullet bullet-dot"></span>',
								),
								array(
									'title' => 'Thành Công',
									'path' => 'success_recharge',
									'bullet' => '<span class="bullet bullet-dot"></span>',
								),
								array(
									'title' => 'Kiểm Tra',
									'role' => 'admin',
									'path' => 'recharge_cancel',
									'bullet' => '<span class="bullet bullet-dot"></span>',
								)
							)
						),
					),
					array(
						'title' => 'Rút Tiền',
						'bullet' => '<span class="bullet bullet-dot"></span>',
						'attributes' => array(
							"data-kt-menu-trigger" => "click",
						),
						'sub' => array(
							'class' => 'menu-sub-accordion menu-active-bg',
							'items' => array(
								array(
									'title' => 'Tât Cả',
									'path' => 'withdraw',
									'bullet' => '<span class="bullet bullet-dot"></span>',
								),
								array(
									'title' => 'Chờ ',
									'path' => 'pending_withdraw',
									'bullet' => '<span class="bullet bullet-dot"></span>',
								),
								array(
									'title' => 'Từ Chối',
									'path' => 'cancel_withdraw',
									'bullet' => '<span class="bullet bullet-dot"></span>',
								),
								array(
									'title' => 'Thành Công',
									'path' => 'success_withdraw',
									'bullet' => '<span class="bullet bullet-dot"></span>',
								)
							)
						)
					)

				)
			),
		),

		array(
			'title' => 'Setting',
			'icon' => array(
				'svg' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen025.svg", "svg-icon-2"),
				'font' => '<i class="bi bi-layers fs-3"></i>',
			),
			'classes' => array('item' => 'menu-accordion'),
			'attributes' => array("data-kt-menu-trigger" => "click"),
			'sub' => array(
				'class' => 'menu-sub-accordion',
				'items' => array(
//					array(
//						'title' => 'Setting Users',
//						'path' => 'bankusers/settings',
//						'bullet' => '<span class="bullet bullet-dot"></span>',
//					),
					array(
						'title' => 'Ngân Hàng',
						'path' => 'banks',
						'bullet' => '<span class="bullet bullet-dot"></span>',
					),
					array(
						'title' => 'Profile',
						'path' => 'partners_profile',
						'bullet' => '<span class="bullet bullet-dot"></span>',
					),
					array(
						'title' => 'Cron vcb',
						'path' => 'partners_profile/cron_vcb',
						'bullet' => '<span class="bullet bullet-dot"></span>',
					),
					array(
						'title' => 'VCB',
						'path' => 'partners_profile/vcb',
						'bullet' => '<span class="bullet bullet-dot"></span>',
					),
					array(
						'title' => 'Logs',
						'path' => 'partners_logs',
						'bullet' => '<span class="bullet bullet-dot"></span>',
					),
//					array(
//						'title' => 'Logs Users',
//						'path' => 'logsusers',
//						'bullet' => '<span class="bullet bullet-dot"></span>',
//					)
				),
			),
		),

		array(
			'title' => 'Lịch Sử',
			'role' => 'admin',
			'icon' => array(
				'svg' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen025.svg", "svg-icon-2"),
				'font' => '<i class="bi bi-layers fs-3"></i>',
			),
			'classes' => array('item' => 'menu-accordion'),
			'attributes' => array(
				"data-kt-menu-trigger" => "click",
			),
			'sub' => array(
				'class' => 'menu-sub-accordion menu-active-bg',
				'role' => 'admin',
				'items' => array(
					array(
						'title' => 'GD Ngân Hàng',

						'bullet' => '<span class="bullet bullet-dot"></span>',
						'attributes' => array(
							"data-kt-menu-trigger" => "click",
						),
						'sub' => array(
							'class' => 'menu-sub-accordion menu-active-bg',
							'items' => array(
								array(
									'title' => 'Tất Cả',
									'role' => 'admin',
									'path' => 'historybank',
									'bullet' => '<span class="bullet bullet-dot"></span>',
								),
								array(
									'title' => 'Vietcombank',
									'role' => 'admin',
									'path' => 'vcb_historybank',
									'bullet' => '<span class="bullet bullet-dot"></span>',
								),
								array(
									'title' => 'ACB ',
									'role' => 'admin',
									'path' => 'acb_historybank',
									'bullet' => '<span class="bullet bullet-dot"></span>',
								),
								array(
									'title' => 'MBBank',
									'role' => 'admin',
									'path' => 'mbbank_historybank',
									'bullet' => '<span class="bullet bullet-dot"></span>',
								),
								array(
									'title' => 'Tpbank',
									'role' => 'admin',
									'path' => 'tpbank_historybank',
									'bullet' => '<span class="bullet bullet-dot"></span>',
								)
							)
						)
					),
					array(
						'title' => 'Nạp Tiền ',
						'path' => 'recharge_success',
						'bullet' => '<span class="bullet bullet-dot"></span>',
					),
					array(
						'title' => 'Rút Tiền',
						'path' => 'withdraw_success',
						'bullet' => '<span class="bullet bullet-dot"></span>',
					),
//						array(
//							'title' => 'Lich Sử ZaloPay',
//							'path' => 'historyzalopay',
//							'bullet' => '<span class="bullet bullet-dot"></span>',
//						),
//						array(
//							'title' => 'Lich Sử  ViettelPay',
//							'path' => 'historyviettelpay',
//							'bullet' => '<span class="bullet bullet-dot"></span>',
//						),
//						array(
//							'title' => 'Lich Sử Momo',
//							'path' => 'historymomo',
//							'bullet' => '<span class="bullet bullet-dot"></span>',
//						),
//						array(
//							'title' => 'Đăng Nhập',
//							'path' => 'loginmanage',
//							'role' => 'admin',
//							'bullet' => '<span class="bullet bullet-dot"></span>',
//						),
//						array(
//							'title' => 'Lỗi Hệ Thống',
//							'path' => 'errormanage',
//							'role' => 'admin',
//							'bullet' => '<span class="bullet bullet-dot"></span>',
//						),
				),
			),
		),

		array(
			'title' => 'Callback',
			'role' => 'admin',
			'icon' => array(
				'svg' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen025.svg", "svg-icon-2"),
				'font' => '<i class="bi bi-layers fs-3"></i>',
			),
			'classes' => array('item' => 'menu-accordion'),
			'attributes' => array(
				"data-kt-menu-trigger" => "click",
			),
			'sub' => array(
				'class' => 'menu-sub-accordion menu-active-bg',
				'items' => array(
					array(
						'title' => 'Callback Nạp Tiền ',
						'path' => 'recharge_callback',
						'role' => 'admin',
						'bullet' => '<span class="bullet bullet-dot"></span>',
					),
					array(
						'title' => 'Callback Rút Tiền ',
						'path' => 'withdraw_callback',
						'role' => 'admin',
						'bullet' => '<span class="bullet bullet-dot"></span>',
					),
				)
			),
		),

		array(
			'classes' => array('content' => 'pt-8 pb-2'),
			'content' => '<span class="menu-section text-muted text-uppercase fs-8 ls-1"> Gởi Yêu Cầu Rút Tiền    </span>',
		),

		array(
			'title' => 'Rút Tiền',
			'icon' => array(
				'svg' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen025.svg", "svg-icon-2"),
				'font' => '<i class="bi bi-layers fs-3"></i>',
			),
			'classes' => array('item' => 'menu-accordion'),
			'attributes' => array(
				"data-kt-menu-trigger" => "click",
			),
			'sub' => array(
				'class' => 'menu-sub-accordion menu-active-bg',
				'items' => array(
					array(
						'title' => 'Rút Tiền',
						'path' => 'withdraw_submit',
						'bullet' => '<span class="bullet bullet-dot"></span>',
					),
				)
			),
		),

		array(
			'classes' => array('content' => 'pt-8 pb-2'),
			'role' => 'admin',
			'content' => '<span class="menu-section text-muted text-uppercase fs-8 ls-1"> Ngân Hàng</span>',
		),

		array(
			'title' => 'ACB',
			'role' => 'admin',
			'icon' => array(
				'svg' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen025.svg", "svg-icon-2"),
				'font' => '<i class="bi bi-layers fs-3"></i>',
			),
			'classes' => array('item' => 'menu-accordion'),
			'attributes' => array(
				"data-kt-menu-trigger" => "click",
			),
			'sub' => array(
				'class' => 'menu-sub-accordion menu-active-bg',
				'items' => array(
//					array(
//						'title' => 'Giao Dịch từ  API',
//						'path' => 'acb',
//						'role' => 'admin',
//						'bullet' => '<span class="bullet bullet-dot"></span>',
//					),
					array(
						'title' => 'Giao Dịch từ CSDL',
						'path' => 'acbtranfer',
						'bullet' => '<span class="bullet bullet-dot"></span>',
					),
//					array(
//						'title' => 'Giao Dịch Nani88',
//						'path' => 'acbtranfer_nani88',
//						'bullet' => '<span class="bullet bullet-dot"></span>',
//					),
//					array(
//						'title' => 'Giao Dịch Nani88 HVD',
//						'path' => 'acbtranfer_nani88_hovanduong',
//						'bullet' => '<span class="bullet bullet-dot"></span>',
//					),
					array(
						'title' => 'ACBank Code',
						'path' => 'acbbankcode',
						'bullet' => '<span class="bullet bullet-dot"></span>',
					),
				),
			),
		),

		array(
			'title' => 'Vietcombank',
			'role' => 'admin',
			'icon' => array(
				'svg' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen025.svg", "svg-icon-2"),
				'font' => '<i class="bi bi-layers fs-3"></i>',
			),
			'classes' => array('item' => 'menu-accordion'),
			'attributes' => array(
				"data-kt-menu-trigger" => "click",
			),
			'sub' => array(
				'class' => 'menu-sub-accordion menu-active-bg',
				'items' => array(
//					array(
//						'title' => 'Giao Dịch từ API',
//						'path' => 'vietcombank',
//						'role' => 'admin',
//						'bullet' => '<span class="bullet bullet-dot"></span>',
//					),
					array(
						'title' => 'Giao Dịch từ CSDL',
						'path' => 'transactionsvietcombank',
						'bullet' => '<span class="bullet bullet-dot"></span>',
					),
				),
			),
		),

		array(
			'title' => 'MBBanks',
			'role' => 'admin',
			'icon' => array(
				'svg' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen025.svg", "svg-icon-2"),
				'font' => '<i class="bi bi-layers fs-3"></i>',
			),
			'classes' => array('item' => 'menu-accordion'),
			'attributes' => array(
				"data-kt-menu-trigger" => "click",
			),
			'sub' => array(
				'class' => 'menu-sub-accordion menu-active-bg',
				'items' => array(
//					array(
//						'title' => 'Giao Dịch từ APIs',
//						'path' => 'mbbank',
//						'role' => 'admin',
//						'bullet' => '<span class="bullet bullet-dot"></span>',
//					),
					array(
						'title' => 'Giao Dịch từ CSDL',
						'path' => 'transactionmbbankhistorylist',
						'bullet' => '<span class="bullet bullet-dot"></span>',
					),
				),
			),
		),

		array(
			'title' => 'TPBank',
			'role' => 'admin',
			'icon' => array(
				'svg' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen025.svg", "svg-icon-2"),
				'font' => '<i class="bi bi-layers fs-3"></i>',
			),
			'classes' => array('item' => 'menu-accordion'),
			'attributes' => array(
				"data-kt-menu-trigger" => "click",
			),
			'sub' => array(
				'class' => 'menu-sub-accordion menu-active-bg',
				'items' => array(
//					array(
//						'title' => 'Giao Dịch từ API',
//						'path' => 'tpbank',
//						'role' => 'admin',
//						'bullet' => '<span class="bullet bullet-dot"></span>',
//					),
                    array(
						'title' => 'Giao Dịch từ CSDL',
						'path' => 'transactionstpbank',
						'role' => 'admin',
						'bullet' => '<span class="bullet bullet-dot"></span>',
					),
				),
			),
		),

//		array(
//			'title' => 'MoMo',
//			'role' => 'admin',
//			'icon' => array(
//				'svg' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen025.svg", "svg-icon-2"),
//				'font' => '<i class="bi bi-layers fs-3"></i>',
//			),
//			'classes' => array('item' => 'menu-accordion'),
//			'attributes' => array(
//				"data-kt-menu-trigger" => "click",
//			),
//			'sub' => array(
//				'class' => 'menu-sub-accordion menu-active-bg',
//				'items' => array(
//					array(
//						'title' => 'Giao Dịch từ API',
//						'path' => 'momo',
//						'role' => 'admin',
//						'bullet' => '<span class="bullet bullet-dot"></span>',
//					),
//					array(
//						'title' => 'Giao Dịch từ CSDL',
//						'path' => 'momotranfer',
//						'bullet' => '<span class="bullet bullet-dot"></span>',
//					),
//				),
//			),
//		),

//		array(
//			'title' => 'Viettelpay',
//			'role' => ['admin'],
//			'icon' => array(
//				'svg' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen025.svg", "svg-icon-2"),
//				'font' => '<i class="bi bi-layers fs-3"></i>',
//			),
//			'classes' => array('item' => 'menu-accordion'),
//			'attributes' => array(
//				"data-kt-menu-trigger" => "click",
//			),
//			'sub' => array(
//				'class' => 'menu-sub-accordion menu-active-bg',
//				'items' => array(
//					array(
//						'title' => 'Danh Sách',
//						'path' => 'viettelpay',
//						'role' => 'admin',
//						'bullet' => '<span class="bullet bullet-dot"></span>',
//					),
//				),
//			),
//		),


//			array(
//				'title' => 'Cron Job',
//				'role' => 'admin',
//				'icon' => array(
//					'svg' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen025.svg", "svg-icon-2"),
//					'font' => '<i class="bi bi-layers fs-3"></i>',
//				),
//				'classes' => array('item' => 'menu-accordion'),
//				'attributes' => array(
//					"data-kt-menu-trigger" => "click",
//				),
//				'sub' => array(
//					'class' => 'menu-sub-accordion menu-active-bg',
//					'items' => array(
//						array(
//							'title' => 'Đang Chạy',
//							'role' => 'admin',
//							'path' => 'cronjob',
//							'bullet' => '<span class="bullet bullet-dot"></span>',
//						)
//					),
//				),
//			),

//			array(
//				'title' => 'Vpbank',
//				'icon' => array(
//					'svg' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen025.svg", "svg-icon-2"),
//					'font' => '<i class="bi bi-layers fs-3"></i>',
//				),
//				'classes' => array('item' => 'menu-accordion'),
//				'attributes' => array(
//					"data-kt-menu-trigger" => "click",
//				),
//				'sub' => array(
//					'class' => 'menu-sub-accordion menu-active-bg',
//					'items' => array(
//						array(
//							'title' => 'Danh Sách',
//							'path' => 'vpbank',
//							'role' => 'admin',
//							'bullet' => '<span class="bullet bullet-dot"></span>',
//						),
//					),
//				),
//			),
//
//			array(
//				'title' => 'Viettelpay',
//				'icon' => array(
//					'svg' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen025.svg", "svg-icon-2"),
//					'font' => '<i class="bi bi-layers fs-3"></i>',
//				),
//				'classes' => array('item' => 'menu-accordion'),
//				'attributes' => array(
//					"data-kt-menu-trigger" => "click",
//				),
//				'sub' => array(
//					'class' => 'menu-sub-accordion menu-active-bg',
//					'items' => array(
//						array(
//							'title' => 'Danh Sách',
//							'path' => 'viettelpay',
//							'role' => 'admin',
//							'bullet' => '<span class="bullet bullet-dot"></span>',
//						),
//					),
//				),
//			),
//
//
//
//			array(
//				'title' => 'TPBank',
//				'icon' => array(
//					'svg' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen025.svg", "svg-icon-2"),
//					'font' => '<i class="bi bi-layers fs-3"></i>',
//				),
//				'classes' => array('item' => 'menu-accordion'),
//				'attributes' => array(
//					"data-kt-menu-trigger" => "click",
//				),
//				'sub' => array(
//					'class' => 'menu-sub-accordion menu-active-bg',
//					'items' => array(
//						array(
//							'title' => 'Danh Sách',
//							'path' => 'tpbank',
//							'role' => 'admin',
//							'bullet' => '<span class="bullet bullet-dot"></span>',
//						),
//					),
//				),
//			),




		array(
			'classes' => array('content' => 'pt-8 pb-2'),
			'role' => 'admin',
			'content' => '<span class="menu-section text-muted text-uppercase fs-8 ls-1"> Đối Tác </span>',
		),

		array(
			'title' => 'Đối Tác',
			'role' => 'admin',
			'icon' => array(
				'svg' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen025.svg", "svg-icon-2"),
				'font' => '<i class="bi bi-layers fs-3"></i>',
			),
			'classes' => array('item' => 'menu-accordion'),
			'attributes' => array(
				"data-kt-menu-trigger" => "click",
			),
			'sub' => array(
				'class' => 'menu-sub-accordion menu-active-bg',
				'items' => array(
					array(
						'title' => 'Danh Sách',
						'path' => 'partners',
						'role' => 'admin',
						'bullet' => '<span class="bullet bullet-dot"></span>',
					),
					array(
						'title' => 'Ngân Hàng Đối Tác',
						'path' => 'partnersbanklist',
						'role' => 'admin',
						'bullet' => '<span class="bullet bullet-dot"></span>',
					),
				),
			),
		),

		array(
			'classes' => array('content' => 'pt-8 pb-2'),
			'role' => 'admin',
			'content' => '<span class="menu-section text-muted text-uppercase fs-8 ls-1"> Hệ Thống </span>',
		),

		array(
			'title' => 'Hệ Thống - API ',
			'icon' => array(
				'svg' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen025.svg", "svg-icon-2"),
				'font' => '<i class="bi bi-layers fs-3"></i>',
			),
			'role' => 'admin',
			'classes' => array('item' => 'menu-accordion'),
			'attributes' => array(
				"data-kt-menu-trigger" => "click",
			),
			'sub' => array(
				'class' => 'menu-sub-accordion menu-active-bg',
				'items' => array(
					array(
						'title' => 'Hệ Thống',
						'path' => 'system',
						'role' => 'admin',
						'bullet' => '<span class="bullet bullet-dot"></span>',
					),
//					array(
//						'title' => 'CronJob Setting',
//						'path' => 'cronjobsetting',
//						'role' => 'admin',
//						'bullet' => '<span class="bullet bullet-dot"></span>',
//					),
//						array(
//							'title' => 'Kết Nối API',
//							'path' => 'apimanage',
//							'role' => 'admin',
//							'bullet' => '<span class="bullet bullet-dot"></span>',
//						),
//						array(
//							'title' => 'Proxy',
//							'path' => 'proxy',
//							'role' => 'admin',
//							'bullet' => '<span class="bullet bullet-dot"></span>',
//						),
				),
			),
		),


		array(
			'classes' => array('content' => 'pt-8 pb-2'),
			'content' => '<span class="menu-section text-muted text-uppercase fs-8 ls-1">  Kết nối API   </span>',
		),

		array(
			'title' => 'Tài liệu kết nối',
			'icon' => array(
				'svg' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen025.svg", "svg-icon-2"),
				'font' => '<i class="bi bi-layers fs-3"></i>',
			),
			'classes' => array('item' => 'menu-accordion'),
			'attributes' => array(
				"data-kt-menu-trigger" => "click",
			),
			'sub' => array(
				'class' => 'menu-sub-accordion menu-active-bg',
				'items' => array(
					array(
						'title' => 'Kết Nối API',
						'path' => 'partners.document',
						'bullet' => '<span class="bullet bullet-dot"></span>',
					)
				),
			),
		),
	),

	// Horizontal menu
	'horizontal' => array(),
);
