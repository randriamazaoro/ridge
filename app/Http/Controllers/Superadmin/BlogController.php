<?php

namespace App\Http\Controllers\Superadmin;

use App\Affiliate;
use App\Category;
use App\Comment;
use App\Email;
use App\Mail\UserHasReceivedTransfer;
use App\OwnedTheme;
use App\Post;
use App\Program;
use App\Sale;
use App\Theme;
use App\TransferRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index()
	{
		$posts = Post::paginate(5);
		$categories = Category::paginate(5);

		return view('superadmin.blog')->with([
			'posts' => $posts,
			'categories' => $categories,
		]);
	}

	public function storeCategory(Request $request)
	{
		Category::create([
    		'title' => $request->title,
    		'color' => $request->color,
    	]);

    	return back()->with([
    					'code' => 'categorie-created',
    					'image' => 'tags',
    					'title' => 'La nouvelle catégorie a bien été publié !',
    					'subtitle' => '',
    					]);
	}

	public function updateCategory(Request $request)
	{
		Category::where('id',$request->id)
			->first()
			->update([
    			'title' => $request->title,
    			'color' => $request->color,
    		]);

    	return back()->with([
    					'code' => 'settings-updated',
    					'image' => 'gear',
    					'title' => 'Vos modifications ont bien été enregistrées !',
    					'subtitle' => '',
    					]);
	}

	public function destroyCategory($id)
	{
		$category = 
		Category::where('id',$id)
			->first()
			->delete();

		return back()->with([
    					'code' => 'category-destroyed',
    					'image' => 'trash',
    					'title' => 'La catégorie a bien été supprimé !',
    					'subtitle' => '',
    					]);
	}

	public function storePost(Request $request)
	{
		Post::create([
    		'subject' => $request->subject,
    		'content' => $request->content,
    		'category_id' => $request->category,
    		'user_id' => 1,
    		'slug' => str_slug($request->subject,'-'),
    	]);

    	return back()->with([
    					'code' => 'post-created',
    					'image' => 'community',
    					'title' => 'Le nouvel article a bien été publié !',
    					'subtitle' => '',
    					]);
	}

	public function updatePost(Request $request)
	{
		$post = Post::where('id',$request->id)->first();
    	$post->subject = $request->subject;
    	$post->content = $request->content;
    	$post->category_id = $request->category;
    	$post->user_id = 1;
    	$post->slug = str_slug($request->subject, '-');
    	$post->save();

    	return back()->with([
    					'code' => 'settings-updated',
    					'image' => 'gear',
    					'title' => 'Vos modifications ont bien été enregistrées !',
    					'subtitle' => '',
    					]);
	}

	public function destroyPost($id)
	{
		$post = Post::where('id',$id)->first();
		$post->delete();

		return back()->with([
    					'code' => 'post-destroyed',
    					'image' => 'trash',
    					'title' => 'L\'article a bien été supprimé !',
    					'subtitle' => '',
    					]);
	}
}
