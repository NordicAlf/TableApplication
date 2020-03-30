<?php

namespace App\Repositories;

use App\Models\Request as TableRequest;

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
}