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
			Schema::create('transactions_vietcombanks', function (Blueprint $table) {
				$table->id();
				$table->string('TransactionDate')->nullable();
				$table->string('Reference')->nullable();
				$table->string('CD')->nullable();
				$table->string('Amount')->nullable();
				$table->string('Description')->nullable();
				$table->string('PCTime')->nullable();
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
			Schema::dropIfExists('transactions_vietcombanks');
		}
	};
