<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mobile', length: 13)->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('name');
            $table->string('password');
            $table->enum('type', User::TYPES)->default(User::TYPE_USER);
            $table->string('avatar', length: 100)->nullable();
            $table->string('website')->nullable();
            $table->string('verify_code', length: 6)->nullable();
            $table->timestamp('verified_at')->nullable();
            // $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};