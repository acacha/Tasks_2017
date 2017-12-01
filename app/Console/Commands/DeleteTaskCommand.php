<?php

namespace App\Console\Commands;

use App\Console\Commands\Traits\AsksForTasks;
use App\Task;
use Illuminate\Console\Command;
use Mockery\Exception;

/**
 * Class DeleteTaskCommand.
 */
class DeleteTaskCommand extends Command
{
    use AsksForTasks;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:delete {id? : The task id to delete}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete a task';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $id = $this->argument('id') ? $this->argument('id') : $this->askForTasks();
        $task = Task::findOrFail($id);

        try {
            $task->delete();
            $this->info('Task has been removed succesfully');
        } catch (Exception $e) {
            $this->error('Error');
        }
    }
}
