<?php

namespace DipeshSukhia\LaravelGenerateHelpers\Commands;
use Illuminate\Console\Command;

class GenerateTrait extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:trait {trait}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Trait Generate';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return bool
     */
    public function handle():bool
    {
        if (empty($this->argument('trait'))) {
            $this->error('Trait Name Argument not found!');
            return false;
        }
        $argument = ucfirst($this->argument('trait'));
        $trait = $argument."Trait.php";

        if (!is_dir(app_path('Traits'))) {
            mkdir(app_path('Traits'), 0755, true);
        }

        if (! file_exists(app_path('Traits/'.$trait))) {
            $template = file_get_contents(__DIR__.'/../resources/stubs/trait.stub');
            $template = str_replace("{{TraitName}}",$argument,$template);
            file_put_contents(app_path('Traits/'.$trait), $template);
            $this->info($trait.' Trait Generated SuccessFully!');
        }else {
            $this->error('Traits Already Exists!');
        }
        return true;
    }
}
