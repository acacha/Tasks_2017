<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateTaskOld extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:taskol {name? : Task name to create}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add new task to database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->argument('name') ? $this->argument('name') : $this->ask('Event name?');
//        dd ($name);
        $this->info('Task has been added to database succesfully.');
    }

}
