<?php

namespace App\Services\Post;

use App\Repository\Interfaces\ICategoryRepository;
use App\Repository\Interfaces\IPostRepository;
use App\Repository\Interfaces\ITagRepository;


class PostService implements IPostService {

    private $postRepo;
    private $categoryRepo;
    private $tagRepo;
    public $post;
    public $category;
    public $tags;
    public $newImageName;

    public function __construct(IPostRepository $postRepository,
                                ICategoryRepository $categoryRepository,
                                ITagRepository $tagRepository){
        $this->postRepo = $postRepository;
        $this->categoryRepo = $categoryRepository;
        $this->tagRepo = $tagRepository;
    }

    public function getAllPosts(){
        return $this->postRepo->getPaginated();
    }

    public function getAllActivePosts(){
        return $this->postRepo->getPaginatedActive();
    }

    public function getAllPostsWithoutPagination(){
        return $this->postRepo->all();
    }

    public function getPostsById($id){
        return $this->postRepo->getById($id);
    }

    public function postRelatedTags($id){
        return $this->getPostsById($id)->tags()->get();
    }

    public function postRelatedComments($id){
        return $this->getPostsById($id)->comments()->get();
    }

    public function deleteById($id){
        return $this->postRepo->deleteById($id);
    }

    public function findPost($id)
    {
        return $this->postRepo->find($id);
    }

    public function createPost($data, $user_id,$image){

        return  $this->postRepo->create([
           'title' => $data['title'],
           'body' => $data['body'],
           'img' => $image,
           'category' => $data['category'],
           'status' => $data['status'],
           'user_id' => $user_id
       ]);


    }
    public function imageProcessing($image,$title ){

        $this->newImageName = time() . '-' . $title . '.' . $image->extension();
        $image->move(public_path('images'), $this->newImageName);
        return $this->newImageName;

    }

    public function editPost($id,$data,$user_id,$image){


          $this->postRepo->update($id,[
            'title' => $data['title'],
            'body' => $data['body'],
            'img' => $image,
            'category' => $data['category'],
            'status' => $data['status'],
            'user_id' => $user_id
        ]);

          return $this->postRepo->find($id);

    }

    public function addCategoryToPost($category,$post){

        $category =  $this->categoryRepo->where('name', $category)
                                        ->first();
        $category->posts()->save($post);

    }

    public function addTagsToPost($tags,$post){

        $tags_id = array();

        foreach ($tags as $t => $tag){

            $search = $this->tagRepo->firstOrCreate(
                ['name' => $tag],
            )->id;

            array_push($tags_id,$search);
        }

        $post->tags()->sync($tags_id);

    }





}
