<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->tinyInteger('type')->default(0);
            $table->timestamps();
        });

        DB::table('users')->insert([
            [
                'name' => 'abbos',
                'email' => 'abbos@gmail.com',
                'password' => Hash::make('123')
            ],
            [
                'name' => 'abdullayev',
                'email' => 'abdullayev@gmail.com',
                'password' => Hash::make('1234')
            ],
        ]);
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
};
