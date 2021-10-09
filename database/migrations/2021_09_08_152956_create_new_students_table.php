<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('gender');
            $table->string('birthplace');
            $table->dateTime('birthday');
            $table->string('address');
            $table->string('school');
            $table->string('un');
            $table->string('indo');
            $table->string('mtk');
            $table->string('bing');
            $table->string('ipa');
            $table->string('url_foto')->nullable();
            $table->string('url_ijazah')->nullable();
            $table->string('url_kk')->nullable();
            $table->integer('id_user')->unsigned()->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });

        Schema::table('new_students', function (Blueprint $table) {
            $table->foreign('id_user', 'new_students_fk_01')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('new_students');
    }
}
