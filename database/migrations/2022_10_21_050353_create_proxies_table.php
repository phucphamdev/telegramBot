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
			Schema::create('proxies', function (Blueprint $table) {
				$table->id();
				$table->text('local')->nullable();
				$table->text('ip')->nullable();
				$table->text('port')->nullable();
				$table->text('username')->nullable();
				$table->text('password')->nullable();
				$table->text('status')->nullable();
				$table->text('type')->nullable();
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
			Schema::dropIfExists('proxies');
		}
	};
