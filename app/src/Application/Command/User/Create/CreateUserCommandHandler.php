<?php

declare(strict_types=1);

namespace App\Application\Command\User\Create;

use App\Domain\Shared\Interface\FlusherInterface;
use App\Domain\Shared\ValueObject\Id;
use App\Domain\User\Model\User;
use App\Domain\User\Repository\UserRepositoryInterface;

final readonly class CreateUserCommandHandler
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
        private FlusherInterface $flusher,
    ) {
    }

    public function handle(CreateUserCommand $command): void
    {
        $user = new User(
            id: new Id($command->userId),
            email: $command->email,
        );

        $this->userRepository->add($user);

        $this->flusher->flush();
    }
}
