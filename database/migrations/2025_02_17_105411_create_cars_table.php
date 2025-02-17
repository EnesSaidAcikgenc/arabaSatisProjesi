<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('model_id');
            $table->unsignedBigInteger('damage_id');
            $table->unsignedInteger('year',1900);
            $table->string('color');
            $table->unsignedInteger('km');
            $table->boolean('guarentee_status')->default(0);
            $table->tinyInteger('vites_turu')->comment('0-manuel 1-otomatik 2-yarıOtomatik');
            $table->tinyInteger('fuel_turu')->comment('0-dizel 1-benzin 2-LPG 3-fabrikaCıkısLPG 4-Elektirik 5-hibrit');
            $table->dateTime('posting_date');
            $table->tinyInteger('status')->comment('0-pasif 1-aktif 2-satıldı');
            $table->integer('fiyat');
            $table->text('description')->nullable();
            $table->softDeletes();
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('model_id')->references('id')->on('car_models')->onDelete('cascade');
            $table->foreign('damage_id')->references('id')->on('car_damages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
