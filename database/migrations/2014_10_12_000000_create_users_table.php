<?php
/**
 * User Table Migration
 *
 * PHP version 5.6
 *
 * @category Migrations
 * @package  Notes
 * @author   Atish Goswami <atishgoswami@gmail.com>
 * @license  MIT 2017
 * @link     None
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * CreateUsersTable
 *
 * @category Migrations
 * @package  Notes
 * @author   Atish Goswami <atishgoswami@gmail.com>
 * @license  MIT 2017
 * @link     None
 */
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->charset   = 'utf8';
            $table->collation = 'utf8_unicode_ci';

            $table->increments('id');
            $table->string('name');
            $table->string('username')->unique();
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
