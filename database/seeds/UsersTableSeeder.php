<?php

use Illuminate\Database\Seeder;
use App\Models\Users\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'over_name' => '田坂',
            'under_name' => '知輝',
            'over_name_kana' => 'タサカ',
            'under_name_kana' => 'トモキ',
            'mail_address' => 'tomoki@ne.jp',
            'sex' => '1',
            'birth_day' => '2000-02-28',
            'role' => '4',
            'password' => Hash::make('tasakatomoki'),
        ]);

        User::create([
            'over_name' => '田坂',
            'under_name' => '智子',
            'over_name_kana' => 'タサカ',
            'under_name_kana' => 'トモコ',
            'mail_address' => 'tomoko@ne.jp',
            'sex' => '2',
            'birth_day' => '2002-09-12',
            'role' => '4',
            'password' => Hash::make('tasakatomoko'),
        ]);

        User::create([
            'over_name' => '英語の',
            'under_name' => '先生',
            'over_name_kana' => 'エイゴノ',
            'under_name_kana' => 'センセイ',
            'mail_address' => 'english@ne.jp',
            'sex' => '2',
            'birth_day' => '2000-01-26',
            'role' => '3',
            'password' => Hash::make('eigonosensei'),
        ]);

        User::create([
            'over_name' => '数学の',
            'under_name' => '先生',
            'over_name_kana' => 'スウガクノ',
            'under_name_kana' => 'センセイ',
            'mail_address' => 'math@ne.jp',
            'sex' => '1',
            'birth_day' => '2000-05-10',
            'role' => '2',
            'password' => Hash::make('suugakunosensei'),
        ]);

        // User::create([
        //     'over_name' => '',
        //     'under_name' => '先生',
        //     'over_name_kana' => 'スウガクノ',
        //     'under_name_kana' => 'センセイ',
        //     'mail_address' => 'math@ne.jp',
        //     'sex' => '1',
        //     'birth_day' => '2000-05-10',
        //     'role' => '2',
        //     'password' => Hash::make('suugakunosensei'),
        // ]);


    }
}
