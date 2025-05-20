<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('lecture_translations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('lecture_id')->constrained()->onDelete('cascade');
            $table->string('locale')->index();

            $table->string('title');

            $table->unique(['lecture_id', 'locale']);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lecture_translations');
    }
};
