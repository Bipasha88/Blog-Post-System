<?php

namespace Tests\Unit;


use App\Models\Post;
use App\Repository\Interfaces\ICategoryRepository;
use App\Repository\Interfaces\IPostRepository;
use App\Repository\Interfaces\ITagRepository;
use App\Services\Post\PostService;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

use Mockery;
use Tests\TestCase;

class PostServiceTest extends TestCase
{
    private $_postRepositoryStub;
    private $_categoryRepositoryStub;
    private $_tagRepositoryStub;

    private $_postRepositoryMock;
    private $_categoryRepositoryMock;
    private $_tagRepositoryMock;


    public static function setUpBeforeClass(): void
    {

    }

    protected function setUp(): void
    {
        $this->_postRepositoryStub = $this->createStub(IPostRepository::class);
        $this->_categoryRepositoryStub = $this->createStub(ICategoryRepository::class);
        $this->_tagRepositoryStub = $this->createStub(ITagRepository::class);

        $this->_postRepositoryMock = $this->createMock(IPostRepository::class);
        $this->_categoryRepositoryMock = $this->createMock(ICategoryRepository::class);
        $this->_tagRepositoryMock = $this->createMock(ITagRepository::class);

        parent::setUp();
        Storage::fake('public');
    }

    protected function tearDown(): void
    {

    }

    public static function tearDownAfterClass(): void
    {

    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_getAllPosts_ifAnyPostExists_returnsAllPosts()
    {
        $posts = collect([new Post(), new Post()]);

        $this->_postRepositoryStub
            ->method('getPaginated')
            ->willReturn($posts);

        $postService = new PostService ($this->_postRepositoryStub,
                                        $this->_categoryRepositoryStub,
                                        $this->_tagRepositoryStub);
        $this->assertCount(2, $postService->getAllPosts());
    }

    public function test_getAllActivePosts_ifAnyPostExists_returnsAllPosts()
    {
        $posts = collect([new Post(), new Post()]);

        $this->_postRepositoryStub
            ->method('getPaginatedActive')
            ->willReturn($posts);

        $postService = new PostService ($this->_postRepositoryStub,
            $this->_categoryRepositoryStub,
            $this->_tagRepositoryStub);
        $this->assertCount(2, $postService->getAllActivePosts());
    }

    public function test_getAllPostsWithoutPagination_ifAnyPostExists_returnsAllPosts()
    {
        $posts = collect([new Post(), new Post()]);

        $this->_postRepositoryStub
            ->method('all')
            ->willReturn($posts);

        $postService = new PostService ($this->_postRepositoryStub,
            $this->_categoryRepositoryStub,
            $this->_tagRepositoryStub);
        $this->assertCount(2, $postService->getAllPostsWithoutPagination());
    }

    public function test_getPostsById_ifAnyPostExists_returnThePost(){

        $id = "1";

        $modelMock = $this->createMock(Post::class);

        $this->_postRepositoryMock
            ->expects($this->once())
            ->method('getById')
            ->with($id)
            ->willReturn($modelMock);

        $postService = new PostService ($this->_postRepositoryMock,
                                        $this->_categoryRepositoryMock,
                                        $this->_tagRepositoryMock);

        $postService->getPostsById($id);

    }

    public function test_deleteById_ifAnyPostExist_deleteThePost()
    {
        $id = "1";

        $this->_postRepositoryMock
            ->expects($this->once())
            ->method('deleteById')
            ->with($id);

        $postService = new PostService ($this->_postRepositoryMock,
            $this->_categoryRepositoryMock,
            $this->_tagRepositoryMock);
        $postService->deleteById($id);
    }

    public function test_findPost_ifAnyPostExists_returnThePost(){

        $id = "1";

        $modelMock = $this->createMock(Post::class);

        $this->_postRepositoryMock
            ->expects($this->once())
            ->method('find')
            ->with($id)
            ->willReturn($modelMock);

        $postService = new PostService ($this->_postRepositoryMock,
            $this->_categoryRepositoryMock,
            $this->_tagRepositoryMock);

        $postService->findPost($id);

    }


    public function test_createPost(){


        $data['title'] = "Post-1";
        $data['body']  = "Lorem Ipsum";
        $data['category']  = "Sports";
        $data['status'] = "Active";
        $user_id    = "1";

        $image =Mockery::mock(UploadedFile::class, [
            'getClientOriginalName'      => 'foo',
            'getClientOriginalExtension' => 'jpg'
        ]);


        $this->_postRepositoryMock
            ->expects($this->once())
            ->method('create')
            ->with(array('title' => $data['title'],
                'body' => $data['body'],
                'img' => $image,
                'category' => $data['category'],
                'status' => $data['status'],
                'user_id' => $user_id));


        $postService = new PostService ($this->_postRepositoryMock,
            $this->_categoryRepositoryMock,
            $this->_tagRepositoryMock);

        $postService->createPost($data, $user_id,$image);

    }

    public function test_editPost_andReturnThePostModel(){
        $id = "2";
        $data['title'] = "Post-1";
        $data['body']  = "Lorem Ipsum";
        $data['category']  = "Sports";
        $data['status'] = "Active";
        $user_id    = "1";


        $image= Mockery::mock(UploadedFile::class, [
            'getClientOriginalName'      => 'foo',
            'getClientOriginalExtension' => 'jpg'
        ]);

        $modelMock = $this->createMock(Post::class);

        $this->_postRepositoryMock
            ->expects($this->once())
            ->method('update')
            ->with($id,array('title' => $data['title'],
                'body' => $data['body'],
                'img' => $image,
                'category' => $data['category'],
                'status' => $data['status'],
                'user_id' => $user_id));

        $this->_postRepositoryMock
            ->expects($this->once())
            ->method('find')
            ->with($id)
            ->willReturn($modelMock);

        $postService = new PostService ($this->_postRepositoryMock,
            $this->_categoryRepositoryMock,
            $this->_tagRepositoryMock);

        $postService->editPost($id,$data,$user_id,$image);


    }


}
