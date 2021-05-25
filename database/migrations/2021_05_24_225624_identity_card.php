<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class IdentityCard extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identity_cards', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nik')->unique();
            $table->string('name',50);
            $table->string('born_at',50);
            $table->date('birth');
            $table->enum('gender',["L","P"])->default("L");
            $table->enum('blood_type',['A','B','C','-'])->default('-');
            $table->string('region',10);
            $table->boolean('is_married')->default(false);
            $table->string('jobs',50)->nullable();
            $table->enum('nationality',['WNI','WNA'])->default('WNI');
            $table->string('valid_until',50)->default('SEUMUR HIDUP');
            $table->integer('age')->default(18);
            $table->string('photo',50)->default('e-ktp.png');
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
        Schema::dropIfExists('identity_cards');
    }
}
