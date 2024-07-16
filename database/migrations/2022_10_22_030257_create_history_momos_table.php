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
			Schema::create('history_momos', function (Blueprint $table) {
				$table->id();
				$table->string('ma_gd')->nullable();
				$table->string('tai_khoan_nhan')->nullable();
				$table->string('tai_khoan_khach_hang')->nullable();
				$table->string('ten_khach_hang')->nullable();
				$table->string('noi_dung')->nullable();
				$table->string('so_tien')->nullable();
				$table->string('so_tien_thuc_nhan')->nullable();
				$table->string('doi_tac')->nullable();
				$table->string('trang_thai')->nullable();
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
			Schema::dropIfExists('history_momos');
		}
	};
