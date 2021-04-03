<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\bbsEntry;

class bbsEntryController extends Controller
{
    function index()
    {
        $item_list = bbsEntry::orderBy("id", "desc")->paginate(3);
        return view("bbs_entry_list", [
            "item_list" => $item_list
        ]);

        //投稿一覧画面を表示
        dd(bbsEntry::all());
    }
    function create(Request $request)
    {
        $input = $request->only('author', 'title', 'body');

        $validator = Validator::make($input, [
            'author' => 'required|string|max:30',
            'title' => 'required|string|max:30',
            'body' => 'required|string|max:100',
        ]);

        //バリデーション失敗
        if ($validator->fails()) {
            return ridirect('/')
                ->withErrors($validator);
        }

        $entry = new bbsEntry();
        $entry->author = $input["author"];
        $entry->title = $input["title"];
        $entry->body = $input["body"];
        $entry->save();
        return redirect('/');
    }
}
