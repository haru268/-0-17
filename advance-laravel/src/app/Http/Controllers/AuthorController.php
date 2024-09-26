<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    // データ一覧ページの表示
    public function index()
    {
        $authors = Author::all();
        return view('index', ['authors' => $authors]);
   }

   // データ追加用ページの表示
    public function add()
    {
        return view('add');
    }

    // 追加機能
    public function create(Request $request)
    {
        $form = $request->all();
        Author::create($form);
        return redirect('/');
    }

    // データ編集ページの表示
    public function edit(Request $request){
        $author = Author::find($request->id);
        return view('edit', ['form' => $author]);
    }

    // 更新機能
    public function update(Request $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Author::find($request->id)->update($form);
        return redirect('/');
    }

    // データ削除用ページの表示
    public function delete(Request $request)
    {
        $author = Author::find($request->id);
        return view('delete', ['author' => $author]);
    }
}
