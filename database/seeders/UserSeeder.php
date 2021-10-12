<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userAli = User::create([
            'first_name' => 'Ali',
            'last_name' => 'Ghasemzadeh',
            'username' => '2280215667',
            'group_id' => 1,
            'email' => 'ali@ghasemzadeh.ir',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('Hero@Zero@21'),
        ]);
    }
}
