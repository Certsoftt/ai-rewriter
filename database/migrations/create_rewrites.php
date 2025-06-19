<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('rewrites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('draft_id');
            $table->longText('original_content');
            $table->longText('rewritten_content')->nullable();
            $table->string('provider');
            $table->string('mode')->nullable();
            $table->float('originality')->nullable();
            $table->float('clarity')->nullable();
            $table->string('status')->default('pending');
            $table->json('history')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('rewrites');
    }
};
