<?php

declare(strict_types=1);

namespace App\Port\Console\Init;

use App\Application\Command\User\Create\CreateUserCommand;
use App\Application\Command\User\Create\CreateUserCommandHandler;
use App\Domain\User\Model\User;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[AsCommand(name: 'app:user:create', description: 'Create user')]
final class CreateUserConsole extends Command
{
    public function __construct(
        private readonly ValidatorInterface $validator,
        private readonly CreateUserCommandHandler $createUserCommandHandler,
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addOption('email', null, InputOption::VALUE_REQUIRED, 'Email');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        /** @var QuestionHelper $helper */
        $helper = $this->getHelper('question');

        /** @var string $email */
        $email = $input->getOption('email') ?: $helper->ask($input, $output, new Question('Email: '));

        $command = new CreateUserCommand();
        $command->userId = User::DEFAULT_ID;
        $command->email = $email;
        $command->name = 'New user';

        $this->validator->validate($command);

        $this->createUserCommandHandler->handle($command);

        return Command::SUCCESS;
    }
}
