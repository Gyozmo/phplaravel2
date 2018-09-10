<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;




class PostController extends Controller
{
 /**
 * 
 * @return Response
 */
    public function showposts(){
        return view('Posts/showposts', ['posts' => Post::all()]);
    }
    
/**
 * @param int $id
 * @return Response
 */

    public function showonepost($id){
        return view ('Posts/showonepost', [
        'posts' => Post::find($id),
        'comments' => Post::find($id)->comments
        ]);
    }

 /**
 * 
 * 
 * @return Response
 */

public function createposts(){
    
        return view('Posts/createposts');
    
    
}
/**
 * 
 * @param Request $request
 * @return Response
 */

    public function storeposts(Request $request){
        
            if($request->has('id')){
                $post = Post::find($request->id);
                $post->title = $request->title;
                $post->content = $request->content;
                $post->author = $request->author;
            } else {
                $post = new Post;
                $post->title = $request->title;
                $post->content = $request->content;
                $post->author = $request->author;
            }
            $post->save();
            return redirect('posts');
    }

    /**
     * @param int $id
     * @return Response
     */
    public function editposts($id){
        return view('Posts/editposts', ['post' => Post::findOrFail($id)]);
    }

    /**
     * @param int $id
     * @return Response
     */
    public function removeposts($id){
        Post::destroy($id);
        return redirect('posts');
    }

    /**
     * @param Request $request
     * @return Response
     */

     public function addcomments(Request $request){
        $user = $request->user()->name;
        $comment = new Comment;
        $comment->content = $request->content;
        $comment->author = $user;
        $comment->post_id = $request->id;

        $comment->save();
        
        return redirect('/onepost/'.$request->id);
     }
    /**
     * @param Request $request
     * @return Response
     */
    public function editcom(){
       return redirect('/editcom'.$request->id); 
    }

    /**
     * @return Response
     */
    public function deletecom(){
        return redirect('/deletecom');
    }
    

}


