<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIbanCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iban_codes', function (Blueprint $table) {
            $table->id();
            $table->integer('locality_code');
            $table->integer('eco_code')->index();
            $table->string('code', 24);

            $table->foreign('eco_code')->references('code')->on('eco_codes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('iban_codes', function (Blueprint $table) {
            $table->dropForeign('iban_codes_eco_code_foreign');
        });

        Schema::dropIfExists('iban_codes');
    }
}
