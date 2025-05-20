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
    Schema::table('lectures', function (Blueprint $table) {
        $table->boolean('is_active')->default(true); // or false depending on your needs
    });
}

public function down()
{
    Schema::table('lectures', function (Blueprint $table) {
        $table->dropColumn('is_active');
    });
}
};