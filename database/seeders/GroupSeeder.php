<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $safaee = Group::create([
            'title' => 'شهید صفایی',
        ]);
    }
}
