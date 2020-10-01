<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('password_reset')) {
            shell_exec('php artisan migrate --path=vendor/laravel/ui/stubs/migrations/');
        }

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->string('full_name');
            $table->dateTime('birthday');
            $table->string('gender');
            $table->string('id_card');
            $table->string('nation')->nullable();
            $table->string('religion')->nullable();
            $table->integer('division_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
