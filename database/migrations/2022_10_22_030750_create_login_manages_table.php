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
			Schema::create('login_manages', function (Blueprint $table) {
				$table->id();
				$table->string('UUID')->nullable();
				$table->string('tai_khoan')->nullable();
				$table->string('id_dang_nhap')->nullable();
				$table->string('otp_dang_nhap')->nullable();
				$table->string('thoi_gian_dang_nhap')->nullable();
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
			Schema::dropIfExists('login_manages');
		}
	};
