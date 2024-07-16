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
			Schema::create('banks', function (Blueprint $table) {
				$table->id();
				$table->string('name')->nullable();
				$table->string('full_name')->nullable();
				$table->text('desc')->nullable();
				$table->string('branch')->nullable();
				$table->string('number1')->nullable();
				$table->string('number2')->nullable();
				$table->string('port')->nullable();
				$table->string('url')->nullable();
				$table->string('username')->nullable();
				$table->string('password')->nullable();
				$table->text('desc_api')->nullable();
				$table->string('customfields1')->nullable();
				$table->string('customfields2')->nullable();
				$table->string('customfields3')->nullable();
				$table->string('customfields4')->nullable();
				$table->string('customfields5')->nullable();
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
			Schema::dropIfExists('banks');
		}
	};
