<?php

declare(strict_types=1);

namespace App\Domain\Shared\Interface;

interface FlusherInterface
{
    public function flush(): void;
}
