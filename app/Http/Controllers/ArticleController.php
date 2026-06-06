<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('pages.articles.index', compact('articles'));
    }

    public function create()
    {
        $doctors = Doctor::all();
        return view('pages.articles.create', compact('doctors'));
    }

    public function store(Request $request, Article $article)
    {
        $new_article = new Article();
        $new_article->doctor_id = $request->doctor_id;
        $new_article->title = $request->title;
        $new_article->content = $request->content;
        $new_article->status = $request->status;
        $new_article->save();

        return redirect()->route('articles.index')->with('success', 'Success add new article');
    }

    public function update(Request $request, Article $article)
    {
        $article->doctor_id = $request->doctor_id;
        $article->title = $request->title;
        $article->content = $request->content;
        $article->status = $request->status;
        $article->views_count = $request->views_count;
        $article->save();

        return redirect()->route('articles.index')->with('success', 'Successfully updated data');
    }

    public function destroy(Article $article)
    {
        try {
            $article->delete();
            return redirect()->route('doctors.index')->with('success', 'Success delete data');
        } catch (\PDOException $x) {
            $msg = "cant delete data!";
            return redirect()->route('doctors.index')->with('error', $msg);
        }
    }

    public function getEditForm(Request $request)
    {
        $id = $request->id;
        $article = Article::find($id);
        $doctors = Doctor::all();
        return response()->json(array(
            'status' => 'oke',
            'msg' => view('pages.articles.getEditForm', compact('article', 'doctors'))->render()
        ), 200);
    }

    public function deleteData(Request $request)
    {
        $id = $request->id;
        $article = Article::find($id);
        $article->delete();
        return response()->json(array(
            'status' => 'oke',
            'msg' => 'Doctor data is removed!'
        ), 200);
    }
}
