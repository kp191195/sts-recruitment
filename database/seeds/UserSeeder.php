<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('m_user')->insert([
            'name' => 'HRD',
            'email' => 'shinosuke14@gmail.com',
            'password' => md5('123456'),
            'create_user_id'=>-1,
            'create_datetime'=>'20170923000000',
            'update_user_id'=>-1,
            'update_datetime'=>'20170923000000',
            'version'=>0
        ]);
    }
}
