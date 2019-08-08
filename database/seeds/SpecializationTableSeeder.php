<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class SpecializationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            'детская стоматология',
            'профессиональная гигиена полости рта',
            'стоматологическая диагностика',
            'лечение зубов (терапия)',
            'стоматологическая хирургия',
            'протезирование зубов (ортопедия)',
            'лечение дёсен (пародонтология)',
            'исправление прикуса (ортодонтия)',
            'имплантация зубов',
            'отбеливание зубов'
        ];

        foreach ($names as $name) {
            DB::table('specializations')->insert([
                'name' => $name,
                'slug' => Str::slug($name),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
