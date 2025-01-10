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
            $table->string('gender')->nullable()->after('id');
            $table->text('hobbies')->nullable()->after('gender');
            $table->string('instagram')->nullable()->after('hobbies');
            $table->string('mobile_number')->nullable()->after('instagram');
            $table->integer('age')->nullable()->after('mobile_number');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['gender', 'hobbies', 'instagram', 'mobile_number', 'age']);
        });
    }
};
