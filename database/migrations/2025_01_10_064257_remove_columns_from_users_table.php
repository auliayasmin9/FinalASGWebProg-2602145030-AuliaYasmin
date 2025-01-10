<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveColumnsFromUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $columns = Schema::getColumnListing('users');
            if (in_array('gender', $columns)) {
                $table->dropColumn('gender');
            }
            if (in_array('hobbies', $columns)) {
                $table->dropColumn('hobbies');
            }
            if (in_array('instagram', $columns)) {
                $table->dropColumn('instagram');
            }
            if (in_array('mobile_number', $columns)) {
                $table->dropColumn('mobile_number');
            }
            if (in_array('age', $columns)) {
                $table->dropColumn('age');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('gender')->nullable();
            $table->text('hobbies')->nullable();
            $table->string('instagram')->nullable();
            $table->string('mobile_number')->nullable();
            $table->integer('age')->nullable();
        });
    }
}
