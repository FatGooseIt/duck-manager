<?php

declare(strict_types=1);

namespace App\Action\User;

use App\Application\Query\User\UserListQueryHandler;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/users/list', name: self::class, methods: [Request::METHOD_GET])]
final class UserListAction extends AbstractController
{
    #[OA\Tag(name: 'Users')]
    #[OA\Response(
        response: Response::HTTP_OK,
        description: 'Get users list',
        content: new OA\JsonContent(example: [
            [
                'id' => '3b415697-b8cd-416d-94f7-fc080802f0e8',
                'email' => 'qwerty@qwe.qwe',
                'name' => 'new user',
            ],
        ]),
    )]
    public function __invoke(UserListQueryHandler $handler): Response
    {
        return $this->render('/user/list.html.twig', [
            'users' => $handler->handle(),
        ]);
    }
}
