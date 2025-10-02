<?php

declare(strict_types=1);

namespace App\Domain\User\Model;

use App\Domain\Shared\ValueObject\Id;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: self::TABLE_NAME)]
final class User
{
    final public const string TABLE_NAME = 'users';

    final public const string  DEFAULT_ID = '01898817-e823-7121-85db-f2bde25e8500';

    #[ORM\Id]
    #[ORM\Column(type: 'uuid_type')]
    private Id $id;

    #[ORM\Column(type: 'string')]
    private string $email;

    #[ORM\Column(type: 'datetime_immutable')]
    private \DateTimeImmutable $createdAt;

    #[ORM\Column(type: 'datetime_immutable')]
    private \DateTimeImmutable $updatedAt;

    public function __construct(
        Id $id,
        string $email,
    ) {
        $this->id = $id;
        $this->email = $email;
        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTimeImmutable();
    }
}
