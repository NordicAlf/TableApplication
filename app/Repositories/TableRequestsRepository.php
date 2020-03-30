<?php

namespace App\Repositories;

use App\Models\Request as TableRequest;
use Illuminate\Support\Facades\DB;

class TableRequestsRepository
{
    public function saveImageOnStorage($request)
    {
        $pathFile = $request->file('image')
            ->store('uploads', 'public');
        return $pathFile;
    }

    public function storeRequest($request, $userId, $pathFile)
    {
        $tableRequest = new TableRequest();

        $tableRequest->theme = $request->theme;
        $tableRequest->message = $request->message;
        if (isset($pathFile)) {
            $tableRequest->file_name = $pathFile;
        }
        $tableRequest->user_id = $userId;

        $result = $tableRequest->save();

        return $result;
    }

    public function getLastTimeRequest($userId)
    {
        $lastRequest = DB::table('requests')->select('created_at')
            ->where('user_id', $userId)
            ->orderByDesc('created_at')
            ->first();

        return $lastRequest;
    }

    public function getDiffHours($date, $lastRequest)
    {
        $diffTimes = $date->diffInMinutes($lastRequest->created_at);
        $howDiffHours = 24 - (ceil($diffTimes / 60));

        return $howDiffHours;
    }
}