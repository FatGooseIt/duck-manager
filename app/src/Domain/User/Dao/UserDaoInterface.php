<?php

declare(strict_types=1);

namespace App\Domain\User\Dao;

interface UserDaoInterface
{
    public function list(): array;
}
