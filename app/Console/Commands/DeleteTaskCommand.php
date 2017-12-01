<?php

namespace Acacha\Events\Console\Commands;

use Acacha\Events\Models\Event;
use Acacha\Tasks\Console\Commands\AsksForTasks;
use Illuminate\Console\Command;
use Mockery\Exception;

/**
 * Class DeleteEventCommand.
 */
class DeleteTaskCommand extends Command
{
    use AsksForTasks;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'event:delete {id? : The event id to edit}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete an event';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $id = $this->argument('id') ? $this->argument('id') : $this->askForEvents();
        $event = Event::findOrFail($id);

        try {
            $event->delete();
            $this->info('Event has been removed succesfully');
        } catch (Exception $e) {
            $this->error('Error');
        }
    }
}
