<?php namespace October\Test\Updates;

use Db;
use Schema;
use October\Rain\Database\Updates\Migration;

/**
 * CreateTest4Tables Countries
 */
class CreateTest4Tables extends Migration
{
    public function up()
    {
        Schema::create('october_test_countries', function($table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->text('content')->nullable();
            $table->text('pages')->nullable();
            $table->text('states')->nullable();
            $table->text('locations')->nullable();
            $table->string('language')->nullable();
            $table->string('currency')->nullable();
            $table->boolean('is_active')->nullable();
            $table->timestamps();
        });

        Schema::create('october_test_countries_types', function($table) {
            $table->integer('country_id')->unsigned();
            $table->integer('attribute_id')->unsigned();
            $table->primary(['country_id', 'attribute_id']);
        });

        Schema::create('october_test_cities', function ($table) {
            $table->increments('id')->unsigned();
            $table->integer('country_id')->unsigned();
            $table->string('name');
        });

        Schema::create('october_test_locations', function ($table) {
            $table->increments('id')->unsigned();
            $table->string('name')->nullable();
            $table->string('status')->nullable();
            $table->text('available_services')->nullable();
            $table->boolean('is_enabled')->nullable();
            $table->integer('sort_order')->nullable();
            $table->integer('parent_id')->unsigned()->nullable()->index();
            $table->integer('country_id')->unsigned()->nullable()->index();
            $table->integer('city_id')->unsigned()->nullable()->index();
        });
    }

    public function down()
    {
        Schema::dropIfExists('october_test_countries');
        Schema::dropIfExists('october_test_countries_types');
        Schema::dropIfExists('october_test_cities');
        Schema::dropIfExists('october_test_locations');
    }
}
