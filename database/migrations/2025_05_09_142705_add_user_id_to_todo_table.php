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
        Schema::table('todo', function (Blueprint $table) {
            // Aggiungi la colonna user_id
            $table->unsignedBigInteger('user_id')->nullable();  // Impostato su nullable per consentire un valore vuoto inizialmente
            // Definisci la chiave esterna con la tabella users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('todo', function (Blueprint $table) {
            // Rimuovi la chiave esterna e la colonna user_id
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
