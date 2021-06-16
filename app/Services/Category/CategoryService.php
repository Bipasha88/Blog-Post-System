<?php

namespace App\Services\Category;

use App\Repository\Interfaces\ICategoryRepository;
use Exception;
use Illuminate\Database\Eloquent\Model;


class CategoryService implements ICategoryService {

    private $categoryRepo;

    public function __construct(ICategoryRepository $categoryRepository){
        $this->categoryRepo = $categoryRepository;
    }

    public function getAllCategories(){
        return $this->categoryRepo->all();
    }

    public function getPaginatedAllCategories(){
        return $this->categoryRepo->getPaginated();
    }

    public function getCategoryById($id)
    {
        return $this->categoryRepo->getById($id);
    }

    public function getAllActiveCategories(){
        return $this->categoryRepo->getPaginatedActive();
    }

    public function postsByCategory($id){
        return $this
            ->getCategoryById($id)
            ->posts()
            ->paginate(3);
    }

    public function createCategory($name,$status,$user_id){

        $existingName = $this->categoryRepo
            ->where("name", $name)
            ->first();

        if ($existingName != null )
            throw new Exception("This name is already used");
        else
        $this->categoryRepo->create([
                'name' => $name,
                'status' => $status,
                'user_id' => $user_id
        ]);

    }

    public function editCategory($id,$data){
        $this->categoryRepo->update($id,$data);
    }

    public function findCategory($id): Model
    {
       return $this->categoryRepo->find($id);
    }

    public function deleteById($id){
        return $this->categoryRepo->deleteById($id);
    }
}
