<?php

declare(strict_types=1);

namespace App\Domain\MonthlySalary\Repository;

use App\Domain\MonthlySalary\Model\Income;

interface IncomeRepositoryInterface
{
    public function add(Income $income): void;
}
