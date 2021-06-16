<?php

namespace Tests\Unit;

use App\Models\Tag;
use App\Repository\Interfaces\ITagRepository;
use App\Services\Tag\TagService;
use PHPUnit\Framework\TestCase;

class TagServiceTest extends TestCase
{

    private $_tagRepositoryMock;

    public static function setUpBeforeClass(): void
    {

    }

    protected function setUp(): void
    {
        $this->_tagRepositoryMock = $this->createMock(ITagRepository::class);
    }

    protected function tearDown(): void
    {

    }

    public static function tearDownAfterClass(): void
    {

    }

    public function test_getAllTags_ifAnyTagExists_returnsAllTags()
    {
        $collection = collect([new Tag(), new Tag()]);

        $this->_tagRepositoryMock
            ->method('all')
            ->willReturn($collection);

        $tagService = new TagService($this->_tagRepositoryMock);
        $this->assertCount(2, $tagService->getAllTags());
    }

    public function test_getTagsById_ifAnyTagExists_returnsTheTag(){

        $collection = collect([new Tag(), new Tag()]);
        $id = 1;

        $this->_tagRepositoryMock
            ->method('getById')
            ->with($id)
            ->willReturn($collection);

        $tagService = new TagService($this->_tagRepositoryMock);
        $this->assertCount(2, $tagService->getTagById($id));
    }

    public function test_findTag_ifAnyTagExists_returnTheTag(){

        $id = "1";

        $modelMock = $this->createMock(Tag::class);

        $this->_tagRepositoryMock
            ->expects($this->once())
            ->method('find')
            ->with($id)
            ->willReturn($modelMock);

        $tagService = new TagService($this->_tagRepositoryMock);

        $tagService->findTag($id);

    }

    public function test_deleteById_ifAnyTagExists_deleteTheTag(){

        $id = "1";

        $this->_tagRepositoryMock
            ->expects($this->once())
            ->method('deleteById')
            ->with($id);

        $tagService = new TagService($this->_tagRepositoryMock);

        $tagService->deleteById($id);

    }
}
