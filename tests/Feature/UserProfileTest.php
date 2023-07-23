<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserProfileTest extends TestCase
{
//    use RefreshDatabase;

    public function 登録()
    {
        $user_id = 3;
        User::factory()->create(['id'=>$user_id]);
        UserProfile::factory()->create(
            [
                'user_id'=>$user_id,
            ]
        );



        $this->assertDatabaseHas('user_profiles',
            [
                'user_id' => $user_id,
            ]
        );
    }

}
