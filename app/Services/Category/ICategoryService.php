<?php

namespace App\Services\Category;

interface ICategoryService{
    public function getAllCategories();
    public function getCategoryById($id);
    public function getAllActiveCategories();
    public function getPaginatedAllCategories();
    public function postsByCategory($id);
    public function createCategory($name,$status,$user_id);
    public function findCategory($id);
    public function editCategory($id,$data);
    public function deleteById($id);

}
