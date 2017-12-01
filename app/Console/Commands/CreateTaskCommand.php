<?php

namespace App\Console\Commands;

use App\Console\Commands\Traits\AsksForUsers;
use App\Task;
use Illuminate\Console\Command;
use Mockery\Exception;

/**
 * Class CreateTaskCommand.
 */
class CreateTaskCommand extends Command
{
    use AsksForUsers;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:create {name? : The task name} {user_id? : The user id} {description? : The description task}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add new task to database';

    /*
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            Task::create([
                'name'    => $this->argument('name') ? $this->argument('name') : $this->ask('Event name?'),
                'description'    => $this->argument('description') ? $this->argument('description') : $this->ask('Description?'),
                'user_id' => $this->argument('user_id') ? $this->argument('user_id') : $this->askForUsers(),
            ]);
        } catch (Exception $e) {
            $this->error('Error');
        }
        $this->info('Task has been added to database succesfully');
    }
}
