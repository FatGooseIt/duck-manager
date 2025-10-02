<?php

declare(strict_types=1);

namespace App\Application\Command\User\Create;

use Symfony\Component\Validator\Constraints;

class CreateUserCommand
{
    #[Constraints\NotBlank]
    #[Constraints\Uuid]
    public string $userId = '';

    #[Constraints\NotBlank]
    #[Constraints\Email]
    public string $email = '';

    #[Constraints\NotBlank]
    #[Constraints\Email]
    public string $name = '';
}
