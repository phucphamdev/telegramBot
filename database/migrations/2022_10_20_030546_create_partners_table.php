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
			Schema::create('partners', function (Blueprint $table) {
				$table->id();
				$table->string('UUID')->nullable();
				$table->string('ten')->nullable();
				$table->string('email')->nullable();
				$table->string('tai_khoan')->nullable();
				$table->string('telegram')->nullable();
				$table->string('trang_thai')->nullable();
				$table->string('cong_ty')->nullable();
				$table->string('dien_thoai')->nullable();
				$table->string('website')->nullable();
				$table->string('quoc_gia')->nullable();
				$table->integer('ck_momo')->nullable();
				$table->integer('ck_vtpay')->nullable();
				$table->integer('ck_bank')->nullable();
				$table->integer('ck_zalo')->nullable();
				$table->bigInteger('so_du')->default(0);
				$table->string('ngay_nhan')->nullable();
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
			Schema::dropIfExists('partners');
		}
	};
