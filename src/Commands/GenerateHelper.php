<?php

namespace DipeshSukhia\LaravelGenerateHelpers\Commands;
use Illuminate\Console\Command;

class GenerateHelper extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'helper:generate {helper}';
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

    private function forceFilePutContents ($filepath, $template){
        try {
            $isInFolder = preg_match("/^(.*)\/([^\/]+)$/", $filepath, $filepathMatches);
            if($isInFolder) {
                $folderName = $filepathMatches[1];
                $fileName = $filepathMatches[2];
                if (!is_dir($folderName)) {
                    mkdir($folderName, 0777, true);
                }
            }
            file_put_contents($filepath, $template);
        } catch (Exception $e) {
            echo "ERR: error writing '$template' to '$filepath', ". $e->getMessage();
        }
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (empty($this->argument('helper'))) {
            $this->error('Helper Name Argument not found!');
            return false;
        }
        $helper = ucfirst($this->argument('helper'))."Helper.php";

        if (! is_dir(app_path('Helpers'))) {
            mkdir(app_path('Helpers'));
        }

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
