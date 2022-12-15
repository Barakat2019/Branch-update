<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function getAllPost()
    {
        //  $posts=DB::table('posts')->get();
        $posts=Post::orderBy('id','DESC')->get();

        return view('posts',compact('posts'));
    }

    //function create post
    public function addPost()
    {

        return view('add-post');
    }

    public function addPostSubmit(PostRequest $request)
    {
         /* DB::table('posts')->insert([
             'title'=>$request->title,
             'body'=>$request->body
         ]);
         */
        $post=new Post();
        $post->title=$request->title;
        $post->body=$request->body;
        $post->user_id=$request->user_id;
        $post->save();

        $request->session()->flash('status','the post created successfully');
         return back()->with('post_created','post has been created successfully');
    }

    public function getPostById($id)
    {
       // $post=DB::table('posts')->where('id',$id)->first();
        $post=Post::where('id',$id)->first();
        return view('single-post',compact('post'));
    }

    public function DeletePost($id)
    {
        //$post=DB::table('posts')->where('id',$id)->delete();
        $post=Post::where('id',$id)->delete();
        return back()->with('posts-deleted','Post has been deleted successfully');

    }

    public function editPost($id)
    {
            //$post=DB::table('posts')->where('id',$id)->first();
            $post=Post::find($id);

            if(!$post)
            {
                return redirect()->route('posts')->with('error','the post not exist');
            }
            return view('edit-post',compact('post'));
    }

    public function UpdatePost(Request $request)
    {
           /*  DB::table('posts')->where('id',$request->id)->update([
               'title'=>$request->title,
               'body'=>$request->body
           ]); */



            Post::where('id',$request->id)->update([
            'title'=>$request->title,
            'body'=>$request->body
           ]);

            return redirect()->route('posts')->with('post_updated','post has been updated successfully');
    }

    //Add comment related to post,one to many
    public function addComment($id)
    {
        $post=Post::find($id);
        $comment=new Comment();
        $comment->comment="This is five comment";

        $post->comments()->save($comment);

        return "Comment has been posted";



    }

    //return the comment related to post
    public function getCommentsByPost($id)
    {
       //$comment=Comment::find($id);

       //return comment related to this post

        $post=Post::find($id);
       if(isset($post))
       {
        return $post=Post::find($id)->comments;

       }
       else
       {
        return "No comment under this post";
       }



    }

    //inner join
    public function innerJoinClause()
    {
        $request=DB::table('users')->join('posts','users.id','=','posts.user_id')
        ->select('users.name','posts.title','posts.body')->get();

        return $request;
    }

    //left join
    public function leftJoinClause()
    {
        $result=DB::table('users')->leftJoin('posts','users.id','=','posts.user_id')
        ->select('users.name','posts.title','posts.body')->get();

        return $result;
    }

    //right join
    public function rightJoinClause()
    {
        $result=DB::table('users')->rightJoin('posts','users.id','=','posts.user_id')
        ->select('users.name','posts.title','posts.body')->get();

        return $result;
    }




}
