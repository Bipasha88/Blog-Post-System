<?php

namespace Tests\Unit;

use App\Models\User;
use App\Repository\Interfaces\IUserRepository;
use App\Services\User\UserService;
use Illuminate\Database\Eloquent\Builder;
use PHPUnit\Framework\TestCase;

class UserServiceTest extends TestCase
{
    private $_userRepositoryMock;

    public static function setUpBeforeClass(): void
    {

    }

    protected function setUp(): void
    {
        $this->_userRepositoryMock = $this->createMock(IUserRepository::class);
    }

    protected function tearDown(): void
    {

    }

    public static function tearDownAfterClass(): void
    {

    }

    public function test_getPendingUser_ifAnyExit_returnTheUsers(){

        $builderMock = $this->createMock(Builder::class);
        $modelMock = $this->createMock(User::class);

        $this->_userRepositoryMock
            ->expects($this->once())
            ->method('where')
            ->with('status','pending')
            ->willReturn($builderMock);

        $builderMock
            ->expects($this->once())
            ->method('get')
            ->willReturn($modelMock);

        $userService = new UserService($this->_userRepositoryMock);
        $userService->getPendingUser();
    }

    public function test_findUser_ifAnyUserExists_returnTheUser(){

        $id = "1";

        $modelMock = $this->createMock(User::class);

        $this->_userRepositoryMock
            ->expects($this->once())
            ->method('find')
            ->with($id)
            ->willReturn($modelMock);

        $userService = new UserService($this->_userRepositoryMock);
        $userService->findUser($id);

    }
}
