<?php

use App\Task;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

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
        initialize_task_permissions();

        create_user();

        first_user_as_task_manager();

        Artisan::call('passport:install');

        DB::table('oauth_clients')->insert(
            [
                'name' => 'Testing',
                'secret' => env('TESTING_TOKEN'),
                'redirect' => 'http://localhost',
                'personal_access_client' => 1,
                'password_client' => 0,
                'revoked' => 0
            ]
        );


        factory(Task::class, 50)->create();
    }
}
