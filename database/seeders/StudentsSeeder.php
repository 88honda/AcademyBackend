<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            [
                'id' => 1, 
                'name' => '鈴木 健司', 
                'age' => '20', 
                'birthday' => '2001/9/21', 
                'email' => 'suzuken@ggmail.com', 
                'tel' => '080-1234-5678', 
                'plan' => 'PREMIUM',
                'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 2, 
                'name' => '山田 可奈子', 
                'age' => '22', 
                'birthday' => '1999/12/6', 
                'email' => 'kanako-1206@ggmail.com', 
                'tel' => '080-1234-5678', 
                'plan' => 'PREMIUM',
                'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 3, 
                'name' => '松田 隆', 
                'age' => '19', 
                'birthday' => '2002/1/10', 
                'email' => 'matsusda-matsu@ggmail.com', 
                'tel' => '080-1234-5678', 
                'plan' => 'STANDARD',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 4, 
                'name' => '山田 秀幸', 
                'age' => '20', 
                'birthday' => '2001/9/21', 
                'email' => 'hide-0001@ggmail.com', 
                'tel' => '080-1234-5678', 
                'plan' => 'PREMIUM',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 5, 
                'name' => '森 直子', 
                'age' => '22', 
                'birthday' => '1999/12/6', 
                'email' => 'naoko-mori@ggmail.com', 
                'tel' => '080-1234-5678', 
                'plan' => 'PREMIUM',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 6, 
                'name' => '高岡 正和', 
                'age' => '19', 
                'birthday' => '2002/1/10', 
                'email' => 'mskz0110@ggmail.com', 
                'tel' => '080-1234-5678', 
                'plan' => 'STANDARD',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 7, 
                'name' => '坂本 優', 
                'age' => '20', 
                'birthday' => '2001/9/21', 
                'email' => 'suguru@ggmail.com', 
                'tel' => '080-1234-5678', 
                'plan' => 'PREMIUM',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 8, 
                'name' => '大島 美香子', 
                'age' => '22', 
                'birthday' => '1999/12/6', 
                'email' => 'mikako01234@ggmail.com', 
                'tel' => '080-1234-5678', 
                'plan' => 'PREMIUM',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 9, 
                'name' => '山本 志帆', 
                'age' => '19', 
                'birthday' => '2002/1/10', 
                'email' => 'yamashiho2002@ggmail.com', 
                'tel' => '080-1234-5678', 
                'plan' => 'STANDARD',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 10, 
                'name' => '丸山 宏二', 
                'age' => '20', 
                'birthday' => '2001/9/21', 
                'email' => 'koji0921@ggmail.com', 
                'tel' => '080-1234-5678', 
                'plan' => 'PREMIUM',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
