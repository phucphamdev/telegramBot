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
			Schema::create('momos', function (Blueprint $table) {
				$table->id();
				$table->text('username')->nullable();
				$table->text('password', 10)->nullable();
				$table->text('name')->nullable();
				$table->text('verification')->nullable();
				$table->text('appVer')->nullable();
				$table->text('appCode')->nullable();
				$table->bigInteger('limit')->nullable();
				$table->text('imei')->nullable();
				$table->text('otp')->nullable();
				$table->text('rkey')->nullable();
				$table->text('auth_token')->nullable();
				$table->text('setupkey')->nullable();
				$table->text('onesignal')->nullable();
				$table->text('requestkey')->nullable();
				$table->text('opt')->nullable();
				$table->text('AAID')->nullable();
				$table->text('TOKEN')->nullable();
				$table->text('SECUREID')->nullable();
				$table->text('refreshToken')->nullable();
				$table->text('ohash')->nullable();
				$table->text('authorization')->nullable();
				$table->text('agentId')->nullable();
				$table->text('setupKeyDecrypt')->nullable();
				$table->text('sessionkey')->nullable();
				$table->text('RSA_PUBLIC_KEY')->nullable();
				$table->integer('balance')->default(0);
				$table->text('device')->nullable();
				$table->text('hardware')->nullable();
				$table->text('facture')->nullable();
				$table->text('MODELID')->nullable();
				$table->json('accounts')->nullable();;
				$table->text('proxy')->nullable();
				$table->text('callback')->nullable();
				$table->boolean('status')->default(0);
				$table->bigInteger('time_login')->nullable();
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
			Schema::dropIfExists('momos');
		}
	};
