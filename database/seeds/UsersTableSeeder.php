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
            'password' => 'tasakatomoki',
        ]);
    }
}
