<?php

use Illuminate\Database\Seeder;

class ComboSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $arrayCombo = [
            [
                'combo_id' => 1,
                'combo_name' => 'COMBO_DOMISILI',
                'description' => 'COMBO YANG BERISI DOMISILI PERUSAHAAN',
                'create_user_id'=>-1,
                'create_datetime'=>'20170923000000',
                'update_user_id'=>-1,
                'update_datetime'=>'20170923000000',
                'version'=>0
            ],
            [
                'combo_id' => 2,
                'combo_name' => 'COMBO_MEMBERSHIP',
                'description' => 'COMBO YANG BERISI STATUS MEMBERSHIP KARYAWAN',
                'create_user_id'=>-1,
                'create_datetime'=>'20170923000000',
                'update_user_id'=>-1,
                'update_datetime'=>'20170923000000',
                'version'=>0
            ],
            [
                'combo_id' => 3,
                'combo_name' => 'COMBO_SPV',
                'description' => 'COMBO YANG BERISI SUPERVISOR SAAT INI',
                'create_user_id'=>-1,
                'create_datetime'=>'20170923000000',
                'update_user_id'=>-1,
                'update_datetime'=>'20170923000000',
                'version'=>0
            ]
        ];

        $arrayComboValue = [
            [
                'combo_id' => 1,
                'value' => 'JAKARTA',
                'sort_no' => ' ',
                'create_user_id'=>-1,
                'create_datetime'=>'20170923000000',
                'update_user_id'=>-1,
                'update_datetime'=>'20170923000000',
                'version'=>0,
                'key'=>'JKT'
            ],
            [
                'combo_id' => 1,
                'value' => 'SEMARANG',
                'sort_no' => ' ',
                'create_user_id'=>-1,
                'create_datetime'=>'20170923000000',
                'update_user_id'=>-1,
                'update_datetime'=>'20170923000000',
                'version'=>0,
                'key'=>'SMG'
            ],
            [
                'combo_id' => 2,
                'value' => 'PERMANENT',
                'sort_no' => ' ',
                'create_user_id'=>-1,
                'create_datetime'=>'20170923000000',
                'update_user_id'=>-1,
                'update_datetime'=>'20170923000000',
                'version'=>0,
                'key'=>'PERMANENT'
            ],
            [
                'combo_id' => 2,
                'value' => 'FREELANCE',
                'sort_no' => ' ',
                'create_user_id'=>-1,
                'create_datetime'=>'20170923000000',
                'update_user_id'=>-1,
                'update_datetime'=>'20170923000000',
                'version'=>0,
                'key'=>'FREELANCE'
            ],
            [
                'combo_id' => 2,
                'value' => 'PROBATION',
                'sort_no' => ' ',
                'create_user_id'=>-1,
                'create_datetime'=>'20170923000000',
                'update_user_id'=>-1,
                'update_datetime'=>'20170923000000',
                'version'=>0,
                'key'=>'PROBATION'
            ],
            [
                'combo_id' => 2,
                'value' => 'INTERNSHIP',
                'sort_no' => ' ',
                'create_user_id'=>-1,
                'create_datetime'=>'20170923000000',
                'update_user_id'=>-1,
                'update_datetime'=>'20170923000000',
                'version'=>0,
                'key'=>'INTERNSHIP'
            ],
            [
                'combo_id' => 3,
                'value' => 'Ali Irawan',
                'sort_no' => ' ',
                'create_user_id'=>-1,
                'create_datetime'=>'20170923000000',
                'update_user_id'=>-1,
                'update_datetime'=>'20170923000000',
                'version'=>0,
                'key'=>'1'
            ],
            [
                'combo_id' => 3,
                'value' => 'Benyamin Chandra',
                'sort_no' => ' ',
                'create_user_id'=>-1,
                'create_datetime'=>'20170923000000',
                'update_user_id'=>-1,
                'update_datetime'=>'20170923000000',
                'version'=>0,
                'key'=>'2'
            ],
            [
                'combo_id' => 3,
                'value' => 'Citrahadi Paiman',
                'sort_no' => ' ',
                'create_user_id'=>-1,
                'create_datetime'=>'20170923000000',
                'update_user_id'=>-1,
                'update_datetime'=>'20170923000000',
                'version'=>0,
                'key'=>'3'
            ],
            [
                'combo_id' => 3,
                'value' => 'David Julius Chrissandy',
                'sort_no' => ' ',
                'create_user_id'=>-1,
                'create_datetime'=>'20170923000000',
                'update_user_id'=>-1,
                'update_datetime'=>'20170923000000',
                'version'=>0,
                'key'=>'4'
            ]

        ];
        DB::table('t_combo')->insert($arrayCombo);

        DB::table('t_combo_value')->insert($arrayComboValue);
    }
}
