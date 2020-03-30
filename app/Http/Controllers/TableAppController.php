<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as TableRequest;
use Illuminate\Support\Facades\Auth;

class TableAppController extends Controller
{
    public function index()
    {
        return view('main');
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $pathFile = $request->file('image')
            ->store('uploads', 'public');

        $tableRequest = new TableRequest();
        $tableRequest->theme = $request->theme;
        $tableRequest->message = $request->message;
        $tableRequest->file_name = $pathFile;
        $tableRequest->user_id = Auth::user()->getAuthIdentifier();
        $result = $tableRequest->save();

        if ($result) {
            return redirect()->route('tableapp.index')
                ->with(['success' => 'Заявка успешно добавлена']);
        } else {
            return back()->withErrors(['msg' => 'Ошибка добавления заявки']);
        }
    }
}
