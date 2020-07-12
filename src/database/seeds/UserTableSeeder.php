<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = "users";
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table($table)->truncate();

        $input = [
            [
                'name' 		 => 'Wiebe.cc',
                'email'      => 'wiebe@kloosterman.cc',
                'password'   => Hash::make('testing123'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' 		 => 'Wiebe.eu',
                'email'      => 'wiebe@kloosterman.eu',
                'password'   => Hash::make('testing123'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' 		 => 'wiebe1971',
                'email'      => 'wiebe1971@gmail.com',
                'password'   => Hash::make('testing123'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' 		 => 'Daniela',
                'email'      => 'daniela@boswijk.net',
                'password'   => Hash::make('testing123'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];

        DB::table($table)->insert($input);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
