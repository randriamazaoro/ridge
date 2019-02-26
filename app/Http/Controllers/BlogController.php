<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Comment;
use App\User;
use App\Category;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function showBlog()
    {
    	$posts = Post::all()->sortByDesc('updated_at');
        $categories = Category::all();

        return view('blog.index')->with([
            'posts' => $posts,
            'categories' => $categories,

        ]);
    }

    public function showBlogPost($slug)
    {
    	$post = Post::where('slug', $slug)->first();

    	return view('blog.posts')->with('post',$post);
    }

    public function storeBlogPostComment(Request $request)
    {
        $post = Post::where('id', $request->post_id)->first();
    	$comment = new Comment;
    	$comment->user_id = Auth::id();
    	$comment->post_id = $request->post_id;
    	$comment->content = $request->content;
   		$comment->save();

   		return redirect("blog/post/".$post->slug ."#comments");
    }

    public function showBlogCategories($title)
    {
        $category = Category::where('title', $title)->first();
        $posts = Post::where('category_id', $category->id)->paginate(6);
        $first_post = $posts->first();

        return view('blog.category')->with([
            'posts' => $posts,
            'first_post' => $first_post,
            'category' => $category,

        ]);
    }
}
