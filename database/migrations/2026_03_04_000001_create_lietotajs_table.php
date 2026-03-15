<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('lietotaji', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('vards', 45);
            $table->enum('loma', ['Admin', 'Darbinieks', 'Lietotajs']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('lietotaji');
    }
};
