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
			Schema::create('acbtranfers', function (Blueprint $table) {
				$table->id();
				$table->text('amount')->nullable();
				$table->text('accountName')->nullable();
				$table->text('receiverName')->nullable();
				$table->text('transactionNumber')->nullable();
				$table->text('description')->nullable();
				$table->text('bankName')->nullable();
				$table->text('isOnline')->nullable();
				$table->text('postingDate')->nullable();
				$table->text('accountOwner')->nullable();
				$table->text('type')->nullable();
				$table->text('receiverAccountNumber')->nullable();
				$table->text('currency')->nullable();
				$table->text('account')->nullable();
				$table->text('activeDatetime')->nullable();
				$table->text('effectiveDate')->nullable();
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
			Schema::dropIfExists('acbtranfers');
		}
	};
