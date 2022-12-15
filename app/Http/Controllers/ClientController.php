<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ClientController extends Controller
{
    public function getAllPost()
    {

        $response=Http::get('https://jsonplaceholder.typicode.com/posts');

       return $response->json();
    }

    public function getPostById($id)
    {
        $post=Http::get('https://jsonplaceholder.typicode.com/posts/'.$id);
        return $post->json();
    }

    public function addPost()
    {
        $post=Http::post('https://jsonplaceholder.typicode.com/posts/',[
            'userId'=> 11,
            'id'=> 101,
            'title'=> "Custom Title Added from json file",
            'body'=> "Custom Body Added From body post"

        ]);

        return $post->json();
    }

    public function updatePost()
    {
        $response=Http::put('https://jsonplaceholder.typicode.com/posts/1',[
            'title'=>'Updated Title',
            'body'=>'Updated Description'
        ]);

        return $response->json();
    }

    public function deletePost($id)
    {
        $response=Http::delete('https://jsonplaceholder.typicode.com/posts'.$id);

        return $response->json();

    }
}
