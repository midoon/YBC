<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('cafes', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->longText("description");
            $table->string("photo");
            $table->foreignId("user_id")->constrained("users")->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cafes');
    }
};
