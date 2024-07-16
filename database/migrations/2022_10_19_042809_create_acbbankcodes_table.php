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
			Schema::create('acbbankcodes', function (Blueprint $table) {
				$table->id();
				$table->text('bank')->nullable();
				$table->text('bankName')->nullable();
				$table->text('napasBankCode')->nullable();
				$table->text('thumbnail')->nullable();
				$table->boolean('fastTransferSupported')->nullable();
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
			Schema::dropIfExists('acbbankcodes');
		}
	};
