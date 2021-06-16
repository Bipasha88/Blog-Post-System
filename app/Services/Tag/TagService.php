<?php

namespace App\Services\Tag;


use App\Repository\Interfaces\ITagRepository;

class TagService implements ITagService {

    private $tagRepo;

    public function __construct(ITagRepository $tagRepository){
        $this->tagRepo = $tagRepository;
    }


    public function getAllTags()
    {
        return $this->tagRepo->all();
    }

    public function getTagById($id)
    {
        return $this->tagRepo->getById($id);
    }

    public function deleteById($id){
        return $this->tagRepo->deleteById($id);
    }

    public function postsByTag($id){
        return $this
            ->getTagById($id)
            ->posts()
            ->paginate(3);
    }

    public function findTag($id)
    {
        return $this->tagRepo->find($id);
    }
}
