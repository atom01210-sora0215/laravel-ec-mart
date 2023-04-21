<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [  
                'name' => 'こどものえほん',
                'description' => 'こどものえほん、初版',
                'price' => 1060,
                'category_id' => 7,
            ],[
                'name' => 'おとなのえほん',
                'description' => 'おとなのえほん、話題作！',
                'price' => 1600,
                'category_id' => 7,
            ],[
                'name' => '話題の絵本',
                'description' => 'おとなのえほん、続編入荷！',
                'price' => 1400,
                'category_id' => 7,
            ],[
                'name' => '絵本の作り方',
                'description' => 'これであなたも絵本作家！',
                'price' => 2000,
                'category_id' => 7,
            ],[
                'name' => '絵本の魔術師',
                'description' => '絵本作家のエピソード',
                'price' => 1800,
                'category_id' => 7,
            ],[
                'name' => '絵本の魔術師２',
                'description' => '絵本作家のエピソード２',
                'price' => 1900,
                'category_id' => 7,
            ],[
                'name' => 'わたしの絵本',
                'description' => '処女作',
                'price' => 1201,
                'category_id' => 7,
            ],[
                'name' => 'わたしの絵本２',
                'description' => 'わたしの絵本シリーズ、第２弾！',
                'price' => 1202,
                'category_id' => 7,
            ],[
                'name' => 'わたしの絵本３',
                'description' => 'わたしの絵本シリーズ、第３弾！',
                'price' => 1203,
                'category_id' => 7,
            ],[
                'name' => 'わたしの絵本４',
                'description' => 'わたしの絵本シリーズ、第４弾！',
                'price' => 1204,
                'category_id' => 7,
            ],[
                'name' => 'わたしの絵本５',
                'description' => 'わたしの絵本シリーズ、第５弾！',
                'price' => 1205,
                'category_id' => 7,
            ],[
                'name' => 'わたしの絵本６',
                'description' => 'わたしの絵本シリーズ、第６弾！',
                'price' => 1206,
                'category_id' => 7,
            ],[
                'name' => 'わたしの絵本７',
                'description' => 'わたしの絵本シリーズ、第７弾！',
                'price' => 1207,
                'category_id' => 7,
            ],[
                'name' => 'わたしの絵本８',
                'description' => 'わたしの絵本シリーズ、第８弾！',
                'price' => 1208,
                'category_id' => 7,
            ],[
                'name' => 'わたしの絵本９',
                'description' => 'わたしの絵本シリーズ、第９弾！',
                'price' => 1209,
                'category_id' => 7,
            ],[
                'name' => 'わたしの絵本10',
                'description' => 'わたしの絵本シリーズ、第10弾！',
                'price' => 1210,
                'category_id' => 7,
            ]
        ]);
    }
}
