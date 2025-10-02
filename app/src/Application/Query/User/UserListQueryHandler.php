<?php

declare(strict_types=1);

namespace App\Application\Query\User;

use App\Domain\User\Dao\UserDaoInterface;

class UserListQueryHandler
{
    public function __construct(
        private UserDaoInterface $userList,
    ) {
    }

    public function handle(): array
    {
        return $this->userList->list();
    }
}
