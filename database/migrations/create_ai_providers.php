<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('ai_providers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('api_key');
            $table->boolean('active')->default(false);
            $table->json('settings')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('ai_providers');
    }
};
