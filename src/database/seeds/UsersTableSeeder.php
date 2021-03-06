<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\User::class, 2)->create();
        factory(App\Models\User::class, 1)->create([
            'user_role_id' => '1',
            'email' => 'admin@admin.ru',
            'api_token' => 'OkGBYAypU1f8pnifAxPrZjhGaffb7cwsUGpvWjhRCE8Z3wto3FthBY01pUJm'
        ]);
    }
}
