<?php

namespace App\Http\Controllers;

use App\Http\Requests\TableRequestCreateRequest;
use Illuminate\Http\Request;
use App\Models\Request as TableRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TableAppController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $id = Auth::user()->getAuthIdentifier();
            $userRequests = TableRequest::all()->where('user_id', $id);

            return view('main', compact('userRequests'));
        }
        return view('main');
    }

    public function create()
    {
        return view('create');
    }

    public function store(TableRequestCreateRequest $request)
    {
        if (isset($request->image)) {
            $pathFile = $request->file('image')
                ->store('uploads', 'public');
        }

        $tableRequest = new TableRequest();
        $tableRequest->theme = $request->theme;
        $tableRequest->message = $request->message;
        if (isset($pathFile)) {
            $tableRequest->file_name = $pathFile;
        }
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
