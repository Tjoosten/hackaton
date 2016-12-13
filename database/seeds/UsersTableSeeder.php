<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data['name']     = 'Tim Joosten';
        $data['email']    = 'Topairy@gmail.com';
        $data['password'] = bcrypt('root1995');

        $table = DB::table('users');
        $table->delete();
        $table->insert($data);
    }
}
