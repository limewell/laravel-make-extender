<?php

namespace DipeshSukhia\LaravelGenerateHelpers\Commands;
use Exception;
use Illuminate\Console\Command;

class GenerateHelper extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:helper {helper}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Helper Generate';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    private function forceFilePutContents ($path, $template){
        try {
            $isInFolder = preg_match("/^(.*)\/([^\/]+)$/", $path, $pathMatches);
            if($isInFolder) {
                $directory = $pathMatches[1];
                if (!is_dir($directory)) {
                    mkdir($directory, 0755, true);
                }
            }
            file_put_contents($path, $template);
        } catch (Exception $e) {
            echo "ERR: error writing '$template' to '$path', ". $e->getMessage();
        }
    }

    /**
     * Execute the console command.
     *
     * @return bool
     */
    public function handle():bool
    {
        if (empty($this->argument('helper'))) {
            $this->error('Helper Name Argument not found!');
            return false;
        }
        $helper = ucwords($this->argument('helper'),"/")."Helper.php";

        if (! file_exists(app_path('Helpers/'.$helper))) {
            $template = file_get_contents(__DIR__.'/../resources/stubs/helper.stub');
            self::forceFilePutContents(app_path('Helpers/'.$helper), $template);
            $this->info($helper.' helper Generated SuccessFully!');
        }else {
            $this->error('Helper Already Exists!');
        }
        return true;
    }
}
