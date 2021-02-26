<?php

use Illuminate\Database\Migrations\Migration;

class AddVoyagerUserFields extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('admin', function ($table) {
            if (!Schema::hasColumn('admin', 'avatar')) {
                $table->string('avatar')->nullable()->after('email')->default('users/default.png');
            }
            $table->bigInteger('role_id')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        if (Schema::hasColumn('admin', 'avatar')) {
            Schema::table('admin', function ($table) {
                $table->dropColumn('avatar');
            });
        }
        if (Schema::hasColumn('admin', 'role_id')) {
            Schema::table('admin', function ($table) {
                $table->dropColumn('role_id');
            });
        }
    }
}
