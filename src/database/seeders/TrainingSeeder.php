<?php

namespace Database\Seeders;

use App\Models\Training;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trainings = [
            ['user_id' => 1, 'body_part_id' => 1, 'training_method_id' => 2, 'name' => 'ベンチプレス'],
            ['user_id' => 1, 'body_part_id' => 1, 'training_method_id' => 2, 'name' => 'ダンベルフライ'],
            ['user_id' => 1, 'body_part_id' => 1, 'training_method_id' => 1, 'name' => 'ディップス'],
            ['user_id' => 1, 'body_part_id' => 2, 'training_method_id' => 2, 'name' => 'サイドレイズ'],
            ['user_id' => 1, 'body_part_id' => 2, 'training_method_id' => 2, 'name' => 'アーノルドプレス'],
            ['user_id' => 1, 'body_part_id' => 2, 'training_method_id' => 2, 'name' => 'インクラインフロントレイズ'],
            ['user_id' => 1, 'body_part_id' => 3, 'training_method_id' => 3, 'name' => 'ラッドプルダウン'],
            ['user_id' => 1, 'body_part_id' => 3, 'training_method_id' => 1, 'name' => '懸垂'],
            ['user_id' => 1, 'body_part_id' => 3, 'training_method_id' => 3, 'name' => 'ローロウ'],
            ['user_id' => 1, 'body_part_id' => 4, 'training_method_id' => 2, 'name' => 'バイセップカール'],
            ['user_id' => 1, 'body_part_id' => 4, 'training_method_id' => 2, 'name' => 'ハンマーカール'],
            ['user_id' => 1, 'body_part_id' => 4, 'training_method_id' => 3, 'name' => 'ケーブルプレスダウン'],
            ['user_id' => 1, 'body_part_id' => 5, 'training_method_id' => 3, 'name' => 'スミススクワット'],
            ['user_id' => 1, 'body_part_id' => 5, 'training_method_id' => 3, 'name' => 'レッグエクステンション'],
            ['user_id' => 1, 'body_part_id' => 5, 'training_method_id' => 3, 'name' => 'パワーレッグプレス'],
            ['user_id' => 1, 'body_part_id' => 1, 'training_method_id' => 3, 'name' => 'インクラインスミスプレス'],
        ];

        foreach ($trainings as $training) {
            Training::create($training);
        }
    }
}
