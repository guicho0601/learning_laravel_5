<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Article;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\CreateArticleRequest;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class ArticlesController extends Controller {

    public function __construct(){
        $this->middleware('auth',array('only'=>'create'));
    }

	public function index(){
        $articles = Article::latest('published_at')->published()->get();
        return view('articles.index',compact('articles'));
    }

    public function show(Article $article){
        return view('articles.show',compact('article'));
    }

    public function create(){
        $tags = Tag::lists('name','id');
        return view('articles.create',compact('tags'));
    }

    public function store(CreateArticleRequest $request){
        $article = Auth::user()->articles()->create($request->all());
        $article->tags()->sync($request->input('tag_list'));
        flash()->success('Your article has been created!');
        return redirect('articles');
    }

    public function edit(Article $article){
        $tags = Tag::lists('name','id');
        return view('articles.edit',compact('article','tags'));
    }

    public function update(Article $article,CreateArticleRequest $request){
        $article->update($request->all());
        $article->tags()->sync($request->input('tag_list'));
        return redirect('articles');
    }

}
