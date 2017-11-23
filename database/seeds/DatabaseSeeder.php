<?php

use App\Task;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(Task::class,50)->create();

        initialize_task_permissions();

        create_user();

        first_user_as_task_manager();

        Artisan::call('passport:install');

        //Canviarà el secret
    }
}
