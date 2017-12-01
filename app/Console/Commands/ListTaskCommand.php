<?php

namespace App\Console\Commands;

use App\Console\Commands\Traits\AsksForTasks;
use App\Task;
use Illuminate\Console\Command;
use Mockery\Exception;

/**
 * Class ListTaskCommand.
 *
 * @package App\Console\Commands
 */
class ListTaskCommand extends Command
{
    use AsksForTasks;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List tasks';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $tasks = Task::all();

        $this->info('Tasks:');

        try {
            $headers = ['Name', 'User id', 'User name', 'Description'];
            $fields = [];
            foreach ($tasks as $task) {
                $fields[] = [
                    'Name:' => $task->name,
                    'User id:' => $task->user_id,
                    'User name:' => $task->user->name,
                    'Description:' => $task->description
                ];
            }

            $this->table($headers, $fields);

        } catch ( Exception $e) {
            $this->error('Error');
        }

    }

}
