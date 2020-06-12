<?php

use Illuminate\Database\Seeder;
use App\Word;

class WordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Word::class, 10)->create();
    }
}
