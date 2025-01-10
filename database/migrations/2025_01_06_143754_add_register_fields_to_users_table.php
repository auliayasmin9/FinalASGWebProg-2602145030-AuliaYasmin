<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'gender')) {
                $table->enum('gender', ['Male', 'Female'])->nullable();
            }
            if (!Schema::hasColumn('users', 'hobbies')) {
                $table->json('hobbies')->nullable();
            }
            if (!Schema::hasColumn('users', 'instagram_username')) {
                $table->string('instagram_username')->nullable()->default('');
            }
            if (!Schema::hasColumn('users', 'mobile_number')) {
                $table->string('mobile_number')->nullable();
            }
            if (!Schema::hasColumn('users', 'age')) {
                $table->integer('age')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['gender', 'hobbies', 'instagram_username', 'mobile_number', 'age']);
        });
    }
};
