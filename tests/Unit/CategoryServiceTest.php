<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Repository\Interfaces\ICategoryRepository;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use PHPUnit\Framework\TestCase;
use App\Services\Category\CategoryService;

class CategoryServiceTest extends TestCase
{
    private $_categoryRepositoryStub;
    private $_categoryRepositoryMock;

    public static function setUpBeforeClass(): void
    {

    }

    protected function setUp(): void
    {
        $this->_categoryRepositoryStub = $this->createStub(ICategoryRepository::class);
        $this->_categoryRepositoryMock = $this->createMock(ICategoryRepository::class);
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
    public function test_getAllCategories_ifAnyCategoryExists_returnsAllCategories()
    {
        $collection = collect([new Category(), new Category()]);

        $this->_categoryRepositoryStub
            ->method('all')
            ->willReturn($collection);

        $categoryService = new CategoryService($this->_categoryRepositoryStub);
        $this->assertCount(2, $categoryService->getAllCategories());
    }

    public function test_getPaginatedAllCategories_ifAnyCategoryExists_returnsAllCategories()
    {
        $collection = collect([new Category(), new Category()]);

        $this->_categoryRepositoryStub
            ->method('getPaginated')
            ->willReturn($collection);

        $categoryService = new CategoryService($this->_categoryRepositoryStub);
        $this->assertCount(2, $categoryService->getPaginatedAllCategories());
    }

    public function test_getAllActiveCategories_ifAnyCategoryExists_returnsAllCategories()
    {
        $collection = collect([new Category(), new Category()]);

        $this->_categoryRepositoryStub
            ->method('getPaginatedActive')
            ->willReturn($collection);

        $categoryService = new CategoryService($this->_categoryRepositoryStub);
        $this->assertCount(2, $categoryService->getAllActiveCategories());
    }

    public function test_getCategoriesById_ifAnyCategoryExists_returnsTheCategory(){

        $collection = collect([new Category(), new Category()]);
        $id = 1;

        $this->_categoryRepositoryStub
            ->method('getById')
            ->with($id)
            ->willReturn($collection);

        $categoryService = new CategoryService($this->_categoryRepositoryStub);
        $this->assertCount(2, $categoryService->getCategoryById($id));
    }

    public function test_createCategory(){

        $name = "Sports";
        $status = "Active";
        $user_id = "1";

        $this->_categoryRepositoryMock
            ->expects($this->once())
            ->method('create')
            ->with(array('name' => $name,
                'status' => $status,
                'user_id' => $user_id));

        $categoryService = new CategoryService($this->_categoryRepositoryMock);
        $categoryService->createCategory($name,$status,$user_id);

    }

    public function test_editCategory(){

        $data['name'] = "Sports";
        $data['status'] = "Active";
        $id = 1;

        $this->_categoryRepositoryMock
            ->expects($this->once())
            ->method('update')
            ->with($id,$data);

        $categoryService = new CategoryService($this->_categoryRepositoryMock);
        $categoryService->editCategory($id,$data);

    }

    public function test_findCategory_ifAnyCategoryExists_returnTheCategory(){

        $id = "1";

        $modelMock = $this->createMock(Category::class);

        $this->_categoryRepositoryMock
            ->expects($this->once())
            ->method('find')
            ->with($id)
            ->willReturn($modelMock);

        $categoryService = new CategoryService ($this->_categoryRepositoryMock,);

        $categoryService->findCategory($id);

    }

    public function test_createCategory_nameExists_throwsException(){

        $this->expectException(Exception::class);

        $name = "Sports";
        $status = "Active";
        $user_id = "1";

        $builderMock = $this->createMock(Builder::class);
        $modelMock = $this->createMock(Category::class);

        $this->_categoryRepositoryMock
            ->expects($this->once())
            ->method('where')
            ->with("name", $name)
            ->willReturn($builderMock);

        $builderMock
            ->expects($this->once())
            ->method('first')
            ->willReturn($modelMock);

        $categoryService = new CategoryService($this->_categoryRepositoryMock);
        $categoryService->createCategory($name,$status,$user_id);
    }

    public function test_deleteById_ifAnyCategoryExists_deleteTheCategory(){

        $id = 1;

        $this->_categoryRepositoryMock
            ->expects($this->once())
            ->method('deleteById')
            ->with($id);

        $categoryService = new CategoryService($this->_categoryRepositoryMock);
         $categoryService->deleteById($id);
    }


}
