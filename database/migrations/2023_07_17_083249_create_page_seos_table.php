<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_seos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pageable_id')->nullable();
            $table->string('pageable_type')->nullable();
            $table->string('page_url')->unique();
            $table->string('page_title')->nullable();
            $table->string('meta_author')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('google_analytics')->nullable();
            $table->text('bing_analytics')->nullable();
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
        Schema::dropIfExists('page_seos');
    }
};
