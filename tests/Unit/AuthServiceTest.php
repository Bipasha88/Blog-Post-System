<?php

namespace Tests\Unit;

use App\Models\User;
use App\Repository\Interfaces\IUserRepository;
use App\Services\Auth\AuthService;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use PHPUnit\Framework\TestCase;

class AuthServiceTest extends TestCase
{

    private $_userRepositoryMock;
    public static function setUpBeforeClass(): void
    {

    }

    protected function setUp(): void
    {
        $this->_userRepositoryMock= $this->createMock(IUserRepository::class);
    }

    protected function tearDown(): void
    {

    }

    public static function tearDownAfterClass(): void
    {

    }

    public function test_register_ifEmailNotExist_registerUser(){
        $data['name'] = "Dola Saha";
        $data['email'] = "dolasaha88@gmail.com";
        $data['password'] = "dola121513";
        $data['status'] = "active";

        $builderMock = $this->createMock(Builder::class);

        $this->_userRepositoryMock
            ->expects($this->once())
            ->method('where')
            ->with('email',$data['email'])
            ->willReturn($builderMock);

        $builderMock
            ->expects($this->once())
            ->method('first')
            ->willReturn(null);

        $this->_userRepositoryMock
            ->expects($this->once())
            ->method('create')
            ->with($data);

        $authService = new AuthService($this->_userRepositoryMock);
        $authService->register($data);
    }

    public function test_register_emailExists_throwsException(){

        $this->expectException(Exception::class);

        $data['name'] = "Dola Saha";
        $data['email'] = "dolasaha88@gmail.com";
        $data['password'] = "dola121513";
        $data['status'] = "active";

        $builderMock = $this->createMock(Builder::class);
        $modelMock = $this->createMock(User::class);

        $this->_userRepositoryMock
            ->expects($this->once())
            ->method('where')
            ->with('email',$data['email'])
            ->willReturn($builderMock);

        $builderMock
            ->expects($this->once())
            ->method('first')
            ->willReturn($modelMock);

        $authService = new AuthService($this->_userRepositoryMock);
        $authService->register($data);
    }

    public function test_getUser_tryToLogin_returnTheUser(){

        $data['email'] = "dolasaha88@gmail.com";
        $data['password'] = "dola121513";

        $builderMock = $this->createMock(Builder::class);
        $modelMock = $this->createMock(User::class);

        $this->_userRepositoryMock
            ->expects($this->once())
            ->method('where')
            ->with('email',$data['email'])
            ->willReturn($builderMock);

        $builderMock
            ->expects($this->once())
            ->method('first')
            ->willReturn($modelMock);

        $authService = new AuthService($this->_userRepositoryMock);
        $authService->getUser($data);
    }
}
