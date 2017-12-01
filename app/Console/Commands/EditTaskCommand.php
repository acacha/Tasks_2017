<?php

namespace App\Console\Commands;

use App\Console\Commands\Traits\AsksForTasks;
use App\Task;
use Illuminate\Console\Command;
use Mockery\Exception;

/**
 * Class EditTaskCommand.
 *
 * @package App\Console\Commands
 */
class EditTaskCommand extends Command
{
    use AsksForTasks;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:edit {id? : The task id to edit} {name? : The task name} {user_id? : The user id} {description? : The task description}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Edits an existing task';

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
            $task->update([
                'name' => $this->argument('name') ? $this->argument('name') : $this->ask('Task name?'),
                'user_id' => $this->argument('user_id') ? $this->argument('user_id') : $this->ask('User id?'),
                'description' => $this->argument('description') ? $this->argument('description') : $this->ask('Task description?')
            ]);
        } catch ( Exception $e) {
            $this->error('Error');
        }
        $this->info('Task has been edited succesfully');
    }

}
