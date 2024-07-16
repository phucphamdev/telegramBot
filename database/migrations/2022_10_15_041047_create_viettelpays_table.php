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
			Schema::create('viettelpays', function (Blueprint $table) {
				$table->id();
				$table->string('phone')->nullable();
				$table->string('password')->nullable();
				$table->string('fullname')->nullable();
				$table->string('accountId')->nullable();
				$table->string('accNo')->nullable();
				$table->string('balance')->nullable();
				$table->string('imei')->nullable();
				$table->string('authorization')->nullable();
				$table->string('session_id')->nullable();
				$table->string('client_private_key')->nullable();
				$table->string('viettel_public_key')->nullable();
				$table->string('token_notification')->nullable();
				$table->string('refreshToken')->nullable();
				$table->string('requestId')->nullable();
				$table->string('DataSend')->nullable();
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
			Schema::dropIfExists('viettelpays');
		}
	};
