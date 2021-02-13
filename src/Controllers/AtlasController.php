<?php

namespace Mariojgt\Atlas\Controllers;

use File;
use Cache;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;

class AtlasController extends Controller
{
    public function __construct()
    {
        $this->base_path = public_path('vendor/atlas/');
    }

    // return the file with the right translation
    public function generate()
    {
        $translation = $this->generateTranslationArray();

        // Echo the javascription in the browser
        header('Content-Type: text/javascript');
        echo ('window.atlas = ' . json_encode($translation['content']) . ';');
        exit();
    }

    // Create the fisical file
    public function makeFile()
    {
        $translation = $this->generateTranslationArray();

        // Create the folder if don't exist
        File::makeDirectory($this->base_path, 0777, true, true);
        // Create a translation file in the server
        File::put(
            $this->base_path . '/' . $translation['file_name'],
            'window.atlas = ' . json_encode($translation['content']) . ';'
        );

        return true;
    }
    // Genere the selected translation
    private function generateTranslationArray()
    {
        // Get the user current language
        $lang = Lang::locale();

        $strings = Cache::rememberForever('lang_' . $lang, function () use ($lang) {
            // Load the files
            $files   = File::allFiles(resource_path('lang/' . $lang . '/'));
            // Create a empty array
            $strings = [];
            // Loop the files
            foreach ($files as $file) {
                // Get the file name so we can use in the javascript
                $name           = basename($file, '.php');
                $strings[$name] = require $file;
            }
            // Return the array
            return $strings;
        });

        return [
            'content' => $strings,
            'file_name' => $lang . '.js',
        ];
    }
}
