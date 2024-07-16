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
			Schema::create('transaction_mb_bank_history_lists', function (Blueprint $table) {
				$table->id();
				$table->string('id_refNo')->nullable();
				$table->string('postingDate')->nullable();
				$table->string('transactionDate')->nullable();
				$table->string('accountNo')->nullable();
				$table->string('creditAmount')->nullable();
				$table->string('debitAmount')->nullable();
				$table->string('currency')->nullable();
				$table->string('description')->nullable();
				$table->string('availableBalance')->nullable();
				$table->string('beneficiaryAccount')->nullable();
				$table->string('refNo')->nullable();
				$table->string('benAccountName')->nullable();
				$table->string('bankName')->nullable();
				$table->string('benAccountNo')->nullable();
				$table->string('dueDate')->nullable();
				$table->string('docId')->nullable();
				$table->string('transactionType')->nullable();
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
			Schema::dropIfExists('transaction_mb_bank_history_lists');
		}
	};
