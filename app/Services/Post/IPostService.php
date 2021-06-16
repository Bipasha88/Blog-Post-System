<?php

namespace App\Services\Post;

interface IPostService{
    public function getAllPosts();
    public function getAllActivePosts();
    public function getPostsById($id);
    public function postRelatedTags($id);
    public function postRelatedComments($id);
    public function findPost($id);
    public function deleteById($id);
    public function createPost($data,  $user_id,$image);
    public function editPost($id,$data, $user_id,$image);
    public function imageProcessing($image,$title );
    public function addCategoryToPost($category,$post);
    public function addTagsToPost($tags,$post);

}
