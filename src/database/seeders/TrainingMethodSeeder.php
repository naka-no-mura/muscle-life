<?php

namespace Database\Seeders;

use App\Models\TrainingMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainingMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $training_methods = [
            ['id' => 1, 'name' => '自重'],
            ['id' => 2, 'name' => 'フリーウェイト'],
            ['id' => 3, 'name' => 'マシン'],
            ['id' => 4, 'name' => '有酸素運動'],
        ];

        foreach ($training_methods as $training_method) {
            TrainingMethod::create($training_method);
        }
    }
}
