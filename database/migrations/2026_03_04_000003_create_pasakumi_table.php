<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pasakumi', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('nosaukums', 45);
            $table->string('kategorija', 45)->nullable();
            $table->date('datums')->nullable();
            $table->time('sakuma_laiks')->nullable();
            $table->time('beigu_laiks')->nullable();
            $table->string('apraksts', 255)->nullable();
            $table->integer('max_dalibnieku')->nullable();
            $table->integer('darbinieks_id')->nullable();
            $table->integer('telpa_id')->nullable();

            // if you want foreign key constraints, uncomment and adjust
            // $table->foreign('darbinieks_id')->references('ID')->on('lietotajs');
            // $table->foreign('telpa_id')->references('ID')->on('telpa');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pasakumi');
    }
};
