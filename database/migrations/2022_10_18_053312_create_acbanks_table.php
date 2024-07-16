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
			Schema::create('acbanks', function (Blueprint $table) {
				$table->id();
				$table->text('accountNumber')->nullable();
				$table->string('shortName')->nullable();
				$table->string('cardHolderName')->nullable();
				$table->text('username')->nullable();
				$table->text('password')->nullable();
				$table->text('cookies')->nullable();
				$table->text('lastLoginInfomation')->nullable();
				$table->text('loginStatus')->nullable();
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
			Schema::dropIfExists('acbanks');
		}
	};
