<?php

namespace App\Services\Tag;

use App\Repository\Interfaces\IEloquentRepository;
use Illuminate\Database\Eloquent\Model;

interface ITagService  {
    public function getAllTags();
    public function getTagById($id);
    public function deleteById($id);
    public function postsByTag($id);
    public function findTag($id);
}
