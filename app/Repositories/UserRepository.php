<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\UserProfile;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @param int $id
     * @return array
     */
    public function find(int $id): array
    {
        return User::find($id)->toArray();
    }

    public function findWithUserProfile(int $id)
    {
        $user = User::find($id);
        if (is_null($user)){
            return [];
        }
        return $user->userprofile;
    }
}
