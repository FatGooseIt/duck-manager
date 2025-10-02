<?php

declare(strict_types=1);

namespace App\Domain\SalaryInfo\Model;

use App\Domain\Shared\ValueObject\Id;
use App\Domain\User\Model\User;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: self::TABLE_NAME)]
final class SalaryInfo
{
    public const string TABLE_NAME = 'salary_info';

    #[ORM\Id]
    #[ORM\Column(type: 'uuid_type')]
    private Id $id;

    #[ORM\ManyToOne(targetEntity: User::class)]
    private User $user;

    #[ORM\Column(type: 'float')]
    private float $salary;

    #[ORM\Column(type: 'datetime_immutable')]
    private \DateTimeImmutable $createdAt;

    #[ORM\Column(type: 'datetime_immutable')]
    private \DateTimeImmutable $updatedAt;

    public function __construct(
        Id $id,
        User $user,
        float $salary,
    ) {
        $this->id = $id;
        $this->user = $user;
        $this->salary = $salary;
        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTimeImmutable();
    }
}
