<?php

namespace App\Http\Controllers;

use App\Articles;
use Illuminate\Http\Request;
use Illuminate\support\Str;

class ArticlesController extends Controller
{
    public function index(){
        $articles = Articles::all();
        return view('articles.articles', ['articles' => $articles]);
    }

    public function add(Request $req){
        $articles = new Articles();
        $validatedData = validator($req->all(), [
            'txtHeader' => 'string|required',
            'txtSubtitle' => 'string|required',
            'articlePic' => 'required',
            'articleContent' => 'required'
        ])->validate();

        $articles->header = $validatedData['txtHeader'];
        $articles->subtitle = $validatedData['txtSubtitle'];
        if($req->isFeatured == NULL){
            $articles->featured = '';
        } else {
            $articles->featured = 'true';
        }
        
        $articles->pic = 'storage/' . $req->file('articlePic')->store('article_pics');
        $articles->content_path = 'storage/' . $req->file('articleContent')->storeAs('article_contents', Str::random(15) . '.html');
        $articles->save();

        return redirect(route('articles'));
    }

    public function delete(Articles $article){
        unlink(public_path($article->pic));
        unlink(public_path($article->content_path));
        $article->delete();

        return redirect(route('articles'));
    }

    public function edit(Articles $article){
        return view('articles.upd-article', ['article' => $article]);
    }

    public function update(Articles $article, Request $req){
        $validatedData = validator($req->all(), [
            'txtHeader' => 'string|required',
            'txtSubtitle' => 'string|required',
        ])->validate();

        $article->header = $validatedData['txtHeader'];
        $article->subtitle = $validatedData['txtSubtitle'];
        
        if($req->isFeatured == NULL){
            $article->featured = '';
        } else {
            $article->featured = 'true';
        }

        if ($req->file('articlePic') != NULL){
            // Delete old photo
            unlink(public_path($article->pic));
            $article->pic = 'storage/' . $req->file('articlePic')->store('article_pics');
        }

        if ($req->file('articleContent') != NULL){
            // Delete old content
            unlink(public_path($article->content_path));
            $article->content_path = 'storage/' . $req->file('articleContent')->storeAs('article_contents', Str::random(15) . '.html');
        }

        $article->save();
        return redirect(route('articles'));
    }

    public function details(Articles $article){
        return view('articles.details', ['article' => $article]);
    }
}
