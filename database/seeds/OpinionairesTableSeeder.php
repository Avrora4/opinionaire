<?php

use Illuminate\Database\Seeder;

class OpinionairesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataSet = [
            [
                'user' => 'osushi',
                'user_id' => 2,
                'title' => 'sasa',
            ],
            [
                'user_id' => 1,
                'title' => '',
            ],
            [
                'user_id' => 2,
                'title' => 'ID: 2 のユーザーの投稿です',
            ],
        ];

        foreach ($dataSet as $data) {
            Post::create($data);
        }
    }
}
