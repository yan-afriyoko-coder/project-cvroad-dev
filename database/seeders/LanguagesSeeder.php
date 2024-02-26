<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = [
            'Zulu',
            'Xhosa',
            'Afrikaans',
            'English',
            'Sepedi',
            'Sotho',
            'Tswana',
            'Venda',
            'Ndebele',
            'Xitsonga'
        ];

        // Truncate the table to remove existing data
        DB::table('languages')->truncate();

        // Seed the table with the official languages
        foreach ($languages as $language) {
            DB::table('languages')->insert([
                'name' => $language,
            ]);
        }
    }
}
