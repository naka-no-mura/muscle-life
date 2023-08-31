<?php

namespace Database\Seeders;

use App\Models\BodyPart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BodyPartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $body_parts = [
            // ['id' => 1, 'name' => '胸'],
            // ['id' => 2, 'name' => '肩'],
            // ['id' => 3, 'name' => '背中'],
            // ['id' => 4, 'name' => '腕'],
            // ['id' => 5, 'name' => '脚'],
            ['id' => 1, 'name' => 'chest'],
            ['id' => 2, 'name' => 'shoulder'],
            ['id' => 3, 'name' => 'back'],
            ['id' => 4, 'name' => 'arm'],
            ['id' => 5, 'name' => 'leg'],
        ];

        foreach ($body_parts as $body_part) {
            BodyPart::create($body_part);
        }
    }
}
