<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ip_address_logs', function (Blueprint $table) {
            $table->id();
            $table->string('event_type');
            $table->string('user_uuid');
            $table->bigInteger('ip_address_id')->unsigned();
            $table->index(['user_uuid']);

            $table->json('changes_made')->nullable();

            $table->foreign('ip_address_id')->references('id')->on('ip_adresses');
            $table->foreign('user_uuid')->references('user_uuid')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ip_address_logs');
    }
};
