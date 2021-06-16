<?php

namespace Tests\Unit;

use App\Models\Comment;
use App\Repository\Interfaces\ICommentRepository;
use App\Services\Comment\CommentService;
use Illuminate\Database\Eloquent\Builder;
use PHPUnit\Framework\TestCase;

class CommentServiceTest extends TestCase
{
    private $_commentRepositoryMock;

    public static function setUpBeforeClass(): void
    {

    }

    protected function setUp(): void
    {
        $this->_commentRepositoryMock = $this->createMock(ICommentRepository::class);
    }

    protected function tearDown(): void
    {

    }

    public static function tearDownAfterClass(): void
    {

    }

    public function test_createComment(){

        $data['name'] = "Dola";
        $data['email'] = "dolasaha88@gmail.com";
        $data['body'] = "Lorem Ipsum";
        $id = "1";

        $this->_commentRepositoryMock
            ->expects($this->once())
            ->method('create')
            ->with(array('name' => $data['name'],
                'email' => $data['email'],
                'body' => $data['body'],
                'post_id' => $id,));

        $commentService = new CommentService($this->_commentRepositoryMock);
        $commentService->createComment($data, $id);

    }

    public function test_findComment_ifAnyCommentExists_returnTheComment(){

        $id = "1";

        $modelMock = $this->createMock(Comment::class);

        $this->_commentRepositoryMock
            ->expects($this->once())
            ->method('find')
            ->with($id)
            ->willReturn($modelMock);

        $commentService = new CommentService($this->_commentRepositoryMock);
        $commentService-> findComment($id);

    }

    public function test_getPendingComment_ifAnyExit_returnTheComments(){

        $builderMock = $this->createMock(Builder::class);
        $modelMock = $this->createMock(Comment::class);

        $this->_commentRepositoryMock
            ->expects($this->once())
            ->method('where')
            ->with('status','pending')
            ->willReturn($builderMock);

        $builderMock
            ->expects($this->once())
            ->method('get')
            ->willReturn($modelMock);

        $commentService = new CommentService($this->_commentRepositoryMock);
        $commentService->getPendingComment();
    }

    public function test_deleteComment_ifAnyCommentExists_returnTheComment(){

        $id = "1";

        $this->_commentRepositoryMock
            ->expects($this->once())
            ->method('deleteById')
            ->with($id);

        $commentService = new CommentService($this->_commentRepositoryMock);
        $commentService-> deleteComment($id);

    }
}
