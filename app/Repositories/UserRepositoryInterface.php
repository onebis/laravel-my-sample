<?php

namespace App\Repositories;

use App\Models\UserProfile;

interface UserRepositoryInterface
{
    public function find(int $id);

    public function findWithUserProfile(int $id);
}
