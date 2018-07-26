<?php

use Illuminate\Database\Seeder;

use App\Models\User;
class AddUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',

        ]);
    }
}
