<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateFolder;
use Illuminate\Http\Request;

class FolderController extends Controller
{
    public function showCreateForm()
    {
        return view('folders/create');
    }

    public function create(CreateFolder $request)
    {
        // フォルダモデルのインスタンスを作成する
        $folder = new Folder();
        // タイトルに入力値を代入する
        $folder->title = $request->title;

        Auth::user()->folders()->save($folder);
        // インスタンスの状態をデータベースに書き込む

        return redirect()->route('tasks.index', [
            'folder' => $folder->id,
        ]);
    }
}
