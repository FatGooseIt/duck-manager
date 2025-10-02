<?php

declare(strict_types=1);

namespace App\Domain\SalaryInfo\Repository;

use App\Domain\SalaryInfo\Model\SalaryInfo;

interface SalaryInfoRepositoryInterface
{
    public function add(SalaryInfo $salaryInfo): void;
}
