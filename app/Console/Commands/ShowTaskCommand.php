<?php

namespace App\Console\Commands;

use App\Console\Commands\Traits\AsksForTasks;
use App\Task;
use Illuminate\Console\Command;
use Mockery\Exception;

/**
 * Class ShowTaskCommand.
 *
 * @package App\Console\Commands
 */
class ShowTaskCommand extends Command
{
    use AsksForTasks;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:show {id? : The task id to edit}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show an task';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $id = $this->argument('id') ? $this->argument('id') : $this->askForTasks();
        $task = Task::findOrFail($id);

        $this->info('Task:');
        try {
            $headers = ['Key', 'Value'];

            $fields = [
              ['Name:' , $task->name],
              ['User id:' , $task->user_id],
              ['User name:' , $task->user->name],
              ['Description:' , $task->description],
            ];

            $this->table($headers, $fields);

        } catch ( Exception $e) {
            $this->error('Error');
        }

    }

}
