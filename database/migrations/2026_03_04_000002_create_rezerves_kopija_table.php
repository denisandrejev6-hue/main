<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('rezerveskopija', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('fails', 45);
            $table->date('izveides_datums')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rezerveskopija');
    }
};
