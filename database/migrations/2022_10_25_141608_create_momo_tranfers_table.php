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
			Schema::create('momo_tranfers', function (Blueprint $table) {
				$table->id();
				$table->string('transId')->nullable();
				$table->string('io')->nullable();
				$table->string('partnerId')->nullable();
				$table->string('partnerName')->nullable();
				$table->string('amount')->nullable();
				$table->string('comment')->nullable();
				$table->string('postBalance')->nullable();
				$table->string('status')->nullable();
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
			Schema::dropIfExists('momo_tranfers');
		}
	};
