<?php namespace October\Test\Updates;

use Db;
use Schema;
use October\Rain\Database\Updates\Migration;

/**
 * CreateTest9Tables Pages
 */
class UpdateUserRolesTable extends Migration
{
    public function up()
    {
        Schema::table('october_test_users_roles', function ($table) {
            $table->smallInteger('evolution')->nullable()->unsigned()->default(0);
        });
    }

    public function down()
    {
        Schema::table('october_test_users_roles', function ($table) {
            $table->dropColumn('evolution');
        });
    }
}
