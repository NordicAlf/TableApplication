<?php

namespace App\Http\Controllers;

use App\Http\Requests\TableRequestCreateRequest;
use Illuminate\Http\Request;
use App\Models\Request as TableRequest;
use Illuminate\Support\Facades\Auth;
use App\Repositories\TableRequestsRepository;
use App\Repositories\UserRepository;

class TableAppController extends Controller
{
    private $tableRequestsRepository;
    private $userRepository;

   public function __construct()
    {
        $this->tableRequestsRepository = app(TableRequestsRepository::class);
        $this->userRepository = app(UserRepository::class);
    }

    public function index()
    {
        if (Auth::check()) {
            $id = $this->userRepository->getAuthUserId();

            // взять все записи конкретного пользователя
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
        // получение айди юзера
        $userId = $this->userRepository->getAuthUserId();

        // Сохранение файла и получение пути
        if (isset($request->image)) {
            $pathFile = $this->tableRequestsRepository
                ->saveImageOnStorage($request);
        } else {
            $pathFile = null;
        }

        // Сохранение
        $result = $this->tableRequestsRepository
            ->storeRequest($request, $userId, $pathFile);

        if ($result) {
            return redirect()->route('tableapp.index')
                ->with(['success' => 'Заявка успешно добавлена']);
        } else {
            return back()->withErrors(['msg' => 'Ошибка добавления заявки']);
        }
    }
}
