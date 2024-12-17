<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            // Hapus foreign key lama
            $table->dropForeign(['people_id']);

            // Tambahkan foreign key baru dengan onDelete restrict
            $table->foreign('people_id')
                  ->references('id')
                  ->on('people')
                  ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            // Hapus foreign key baru
            $table->dropForeign(['people_id']);

            // Tambahkan kembali foreign key lama dengan onDelete cascade
            $table->foreign('people_id')
                  ->references('id')
                  ->on('people')
                  ->onDelete('cascade');
        });
    }
};
