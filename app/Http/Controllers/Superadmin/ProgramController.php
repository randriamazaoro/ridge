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
use App\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class ProgramController extends Controller
{
	public function __construct()
	{
	    $this->middleware('auth');
	    $this->middleware('superadmin');
	}   

    public function index()
	{
		$programs = Program::all();
		$themes = Theme::paginate(3);
		$faqs_account = Faq::where('category','Compte')->paginate(3);
		$faqs_payment = Faq::where('category','Paiement')->paginate(3);
		$faqs_product = Faq::where('category','Produit')->paginate(3);
		$faqs_CPA = Faq::where('category','CPA & Affiliation')->paginate(3);

		return view('superadmin.programs')->with([
			'programs' => $programs,
			'themes' => $themes,
			'faqs_account' => $faqs_account,
			'faqs_payment' => $faqs_payment,
			'faqs_product' => $faqs_product,
			'faqs_CPA' => $faqs_CPA,
		]);
	}

	public function storeTheme(Request $request)
	{
		Theme::create([
            'title' => $request->title,
            'url' => $request->url,
            'description' => $request->description,
        ]);

		return back()->with([
    					'code' => 'theme-created',
    					'image' => 'list',
    					'title' => 'Ajout de thème réussit !',
    					'subtitle' => '',
    					]);
	}

	public function updateTheme(Request $request)
	{
		Theme::where('id',$request->id)
			->first()
			->update([
				'title' => $request->title,
				'url' => $request->url,
				'description' => $request->description,
			]);

		return back()->with([
    					'code' => 'settings-updated',
    					'image' => 'gear',
    					'title' => 'Vos modifications ont bien été enregistrées !',
    					'subtitle' => '',
    					]);
	}

	public function destroyTheme($id)
	{
		Theme::where('id',$id)
			->first()
			->delete();

		return back()->with([
    					'code' => 'theme-destroyed',
    					'image' => 'trash',
    					'title' => 'La theme a bien été supprimé !',
    					'subtitle' => '',
    					]);
	}

	public function storeFaq(Request $request)
	{
		Faq::create([
            'question' => $request->question,
            'answer' => $request->answer,
            'category' => $request->category,
        ]);

		return back()->with([
    					'code' => 'faq-created',
    					'image' => 'brainstorming',
    					'title' => 'Ajout d\'information réussie !',
    					'subtitle' => '',
    					]);
	}

	public function updateFaq(Request $request)
	{
		Faq::where('id',$request->id)
			->first()
			->update([
				'question' => $request->question,
				'answer' => $request->answer,
            	'category' => $request->category,
			]);

		return back()->with([
    					'code' => 'settings-updated',
    					'image' => 'gear',
    					'title' => 'Vos modifications ont bien été enregistrées !',
    					'subtitle' => '',
    					]);
	}

	public function destroyFaq($id)
	{
		Faq::where('id',$id)
			->first()
			->delete();

		return back()->with([
    					'code' => 'theme-destroyed',
    					'image' => 'trash',
    					'title' => 'L\'information a bien été supprimé !',
    					'subtitle' => '',
    					]);
	}
}
