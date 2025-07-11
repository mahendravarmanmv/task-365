<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
	public function up()
	{
	Schema::create('wishlists', function (Blueprint $table) {
		$table->id();
		$table->unsignedBigInteger('user_id');
		$table->unsignedBigInteger('lead_id');
		$table->timestamps();
		
		$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		$table->foreign('lead_id')->references('id')->on('leads')->onDelete('cascade');
	});
	}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wishlists');
    }
};
