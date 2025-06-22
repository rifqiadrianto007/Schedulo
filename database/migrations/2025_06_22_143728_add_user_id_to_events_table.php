<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        // Schema::table('events', function (Blueprint $table) {
        //     $table->foreignId('user_id')->constrained()->onDelete('cascade');
        Schema::table('events', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable(); // biar aman dulu
        });
    }

    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
