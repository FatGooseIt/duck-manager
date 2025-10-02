<?php

declare(strict_types=1);

namespace App\Domain\MonthlySalary\Model;

use App\Domain\SalaryInfo\Model\SalaryInfo;
use App\Domain\Shared\ValueObject\Id;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: self::TABLE_NAME)]
class Income
{
    public const string TABLE_NAME = 'incomes';

    #[ORM\Id]
    #[ORM\Column(type: 'uuid_type')]
    private Id $id;

    #[ORM\ManyToOne(targetEntity: SalaryInfo::class)]
    private SalaryInfo $salaryInfo;

    #[ORM\Column(type: 'float')]
    private float $currencyRate;

    // before tax
    #[ORM\Column(type: 'float')]
    private float $income;

    // after tax
    #[ORM\Column(type: 'float')]
    private float $netIncome;

    #[ORM\Column(type: 'datetime_immutable')]
    private \DateTimeImmutable $createdAt;

    #[ORM\Column(type: 'datetime_immutable')]
    private \DateTimeImmutable $updatedAt;

    public function __construct(
        Id $id,
        SalaryInfo $salaryInfo,
        float $currencyRate,
        float $income,
        float $netIncome,
    ) {
        $this->id = $id;
        $this->salaryInfo = $salaryInfo;
        $this->currencyRate = $currencyRate;
        $this->income = $income;
        $this->netIncome = $netIncome;
        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTimeImmutable();
    }
}
