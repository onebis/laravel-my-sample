<?php

namespace App\Services;

use App\Repositories\UserRepositoryInterface;

class UserService
{
    protected $userRepository;

    public function __construct(
        UserRepositoryInterface $userRepository
    )
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getUser(int $id)
    {
        $user = $this->userRepository->find($id);
        return $user;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getUserProfile(int $id)
    {
        $user = $this->userRepository->findWithUserProfile($id);

        return $user;
    }
}
