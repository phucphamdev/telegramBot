<?php
	
	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Support\Facades\Schema;
	
	return new class extends Migration {
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up()
		{
			Schema::create('systems', function (Blueprint $table) {
				$table->id();
				$table->string('port')->nullable();
				$table->string('url')->nullable();
				$table->string('username')->nullable();
				$table->string('password')->nullable();
				$table->string('captchaKey')->nullable();
				$table->string('imei')->nullable();
				$table->string('cust_id')->nullable();
				$table->string('account_no')->nullable();
				$table->string('sessionId')->nullable();
				$table->string('customfields1')->nullable();
				$table->string('customfields2')->nullable();
				$table->string('customfields3')->nullable();
				$table->string('customfields4')->nullable();
				$table->string('customfields5')->nullable();
				$table->string('vcb_sessionId')->nullable();
				$table->string('vcb_mobileId')->nullable();
				$table->string('vcb_clientId')->nullable();
				$table->string('vcb_cif')->nullable();
				$table->string('vcb_username')->nullable();
				$table->string('vcb_password')->nullable();
				$table->string('vcb_account_number')->nullable();
				$table->string('vcb_captchaKey')->nullable();
				$table->string('acb_port')->nullable();
				$table->string('acb_db_host')->nullable();
				$table->string('acb_db_port')->nullable();
				$table->string('acb_db_user')->nullable();
				$table->string('acb_db_password')->nullable();
				$table->string('acb_db_database')->nullable();
				$table->string('acb_captcha_service')->nullable();
				$table->string('acb_captcha_key')->nullable();
				$table->text('acb_accessToken')->nullable();
				$table->text('acb_identity')->nullable();
				$table->text('acb_refreshToken')->nullable();
				$table->text('acb_username')->nullable();
				$table->text('acb_password')->nullable();
				$table->text('acb_accountNumber')->nullable();
				$table->text('acb_currentUser')->nullable();
				$table->timestamps();
			});
		}
		
		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down()
		{
			Schema::dropIfExists('systems');
		}
	};
