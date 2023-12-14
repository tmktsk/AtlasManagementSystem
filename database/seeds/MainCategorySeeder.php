<?php

use Illuminate\Database\Seeder;
use App\Models\Categories\MainCategory;

class MainCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MainCategory::create(['main_category' => '教科']);
        //
    }
}
