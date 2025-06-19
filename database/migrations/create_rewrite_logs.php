<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('rewrite_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rewrite_id');
            $table->unsignedBigInteger('user_id')->nullable()->after('rewrite_id');
            $table->string('provider');
            $table->string('mode')->nullable();
            $table->float('duration')->nullable();
            $table->float('originality')->nullable();
            $table->float('clarity')->nullable();
            $table->string('action')->nullable()->after('user_id');
            $table->timestamp('created_at')->useCurrent();
        });
    }
    public function down()
    {
        Schema::dropIfExists('rewrite_logs');
    }
};
