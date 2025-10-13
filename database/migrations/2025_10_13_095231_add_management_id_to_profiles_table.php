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
    Schema::table('profiles', function (Blueprint $table) {
        $table->unsignedBigInteger('management_id')->nullable()->after('id');
        $table->foreign('management_id')->references('id')->on('management')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('profiles', function (Blueprint $table) {
        $table->dropForeign(['management_id']);
        $table->dropColumn('management_id');
    });
}

};
