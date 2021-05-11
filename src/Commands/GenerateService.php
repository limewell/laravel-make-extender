<?php

namespace DipeshSukhia\LaravelGenerateHelpers\Commands;
use Illuminate\Console\Command;

class GenerateService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:service {service}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Service Generate';

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
        if (empty($this->argument('service'))) {
            $this->error('Service Name Argument not found!');
            return false;
        }
        $argument = ucfirst($this->argument('service'));
        $service = $argument."Service.php";

        if (!is_dir(app_path('Services'))) {
            mkdir(app_path('Services'), 0755, true);
        }

        if (! file_exists(app_path('Services/'.$service))) {
            $template = file_get_contents(__DIR__.'/../resources/stubs/service.stub');
            $template = str_replace("{{ServicesName}}",$argument,$template);
            file_put_contents(app_path('Services/'.$service), $template);
            $this->info($service.' Service Generated SuccessFully!');
        }else {
            $this->error('Service Already Exists!');
        }
        return true;
    }
}
