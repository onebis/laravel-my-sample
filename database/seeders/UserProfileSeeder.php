<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $users->each(function($user) {
            UserProfile::factory()->create(
                [
                    'user_id'=>$user->id,
                    'nickname'=>$user->name
                ]
            );
        });
    }
}
