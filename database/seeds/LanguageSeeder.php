<?php

use Illuminate\Database\Seeder;
use App\Language;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = config('language');
        foreach ($languages as $language) {
            $newLanguage = new Language();
            $newLanguage->name = $language['name'];
            $newLanguage->description = $language['description'];
            $newLanguage->current_version = $language['current_version'];
            $newLanguage->save();
        }
    }
}
