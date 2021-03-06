<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
       DB::table('users')->insert([
           'name'       => 'Darth',
           'email'      => 'darthv@deathstar.com',
           'password'   => Hash::make('thedarkside'),
           'created_at' => new DateTime(),
           'updated_at' => new DateTime(),
           'admin'      => '0'
         ]);

       DB::table('users')->insert([
           'name'       => 'Luke',
           'email'      => 'lightwalker@rebels.com',
           'password'   => Hash::make('hesnotmydad'),
           'created_at' => new DateTime(),
           'updated_at' => new DateTime(),
           'admin'      => '0'
         ]);

       DB::table('users')->insert([
           'name'       => 'Rebel',
           'email'      => 'dancingsmallman@rebels.com',
           'password'   => Hash::make('yodaIam'),
           'created_at' => new DateTime(),
           'updated_at' => new DateTime(),
           'admin'      => '0'
         ]);
     }
 }
