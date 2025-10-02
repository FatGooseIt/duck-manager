<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Repository\Dbal\User;

use App\Domain\User\Dao\UserDaoInterface;
use App\Domain\User\Model\User;
use Doctrine\DBAL\Connection;

final readonly class UserDbal implements UserDaoInterface
{
    public function __construct(
        private Connection $connection,
    ) {
    }

    public function list(): array
    {
        $result = $this->connection->createQueryBuilder()
            ->select(
                'u.id',
                'u.email',
                'u.name',
            )
            ->from(User::TABLE_NAME, 'u')
            ->executeQuery();

        return $result->fetchAllAssociative();
    }
}
