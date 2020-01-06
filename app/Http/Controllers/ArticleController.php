<?php

namespace App\Http\Controllers;
use App\Article;
use Illuminate\Http\Request;
use App\User;
use App\Tag;
use App\Country;
use Auth;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
/*         if(Auth::user()->is_admin == 1){
            $articles = Article::orderBy('published_at', 'asc')->get();
            return view('articles.index', compact('articles'));
        }
        else{
            return redirect()->action('ArticleController@show', ['id' => 1]);
        } */
        $articles = Article::orderBy('created_at','desc')->paginate(4);
        //$articles = Article::where('active', 1)->orderBy('title','desc')->take(10)->get();
        $users = User::all();
        $tags = Tag::all();
        //$posts = Article::orderBy('created_at','desc')->paginate(3);
        return view('articles.index', compact('articles', 'users','tags'));
    }

    public function main(){
        $articles = Article::where('user_id', 1)->orderBy('title', 'desc')->take(4)->get();
        $tags = Tag::all();
        return view('welcome', ['articles' => $articles, 'tags' => $tags]);
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //if(Auth::user()->is_admin == 1){
            return view('articles.create');
       /*  }
        else {
            return redirect('home');
        } */
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'title' => 'bail|required|unique:articles|max:255',
            'body' => 'required',
            ]);

        if($file = $request->file('image')){
            $name = $file->getClientOriginalName();
            $post = new Article;
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            $post->image = $name;
            $post->save();
            $file->move('images/upload', $name);
            }

            if($post){
                return redirect('articles')->with('status', 'Article Created!');
            }
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
        $tags = Article::find($article->id)->tags;
        $article = Article::find($article->id);
        $user = User::find($article->user_id);
        $country = Country::where('id', $user->country_id)->get()->first();
        return view('articles.show', compact('article', 'tags', 'country'));
    }


    public function articles($id){
        $user = User::find($id);
        return view('articles.articles', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
/*         if(Auth::user()->is_admin == 1){
 */            $article = Article::findOrFail($id);
            return view('articles.edit', compact('article'));
        /* }
        else{
            return redirect('home');
        } */
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
        //if(Auth::user()->is_admin == 1){

            if($file = $request->file('image')){
                
            $name = $file->getClientOriginalName();
            $post = Article::findOrFail($id);
            
            $post->title = $request->input('title');
            $post->body = $request->input('body');
/*             $post->published_at = $request->input('published_at');
 */            $post->image = $name;
            $post->save();

            $file->move('images/upload', $name);
            }
            else {
                // code...
                $post = Article::findOrFail($id);
                $post->title = $request->input('title');
                $post->body = $request->input('body');
/*                 $post->published_at = $request->input('published_at');
 */                $post->save();
                }
            if($post){
                // with is a session params (name, value)
                return redirect('articles')->with('status', 'Article Updated!');
            }
        //}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
