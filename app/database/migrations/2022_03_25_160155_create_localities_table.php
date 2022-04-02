<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localities', function (Blueprint $table) {
            $table->id('code');
            $table->integer('district_code')->index();
            $table->string('name');

            # создаём внешний ключ для district_code, связываем с districts.code.
            $table->foreign('district_code')->references('code')->on('districts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('localities', function (Blueprint $table) {
            $table->dropForeign('localities_district_code_foreign');
        });

        Schema::dropIfExists('localities');
    }
}
