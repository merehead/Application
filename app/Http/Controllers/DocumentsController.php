<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Plupload;
use App\Document;
use Auth;

class DocumentsController extends Controller
{
    public function upload(Request $request){
        $user = Auth::user();

        return Plupload::receive('file', function ($file) use ($user, $request)
        {
            $fileName = md5(uniqid()).'.'.$file->extension();
            $user->documents()->create([
                'title' => $request->title,
                'type' => $request->type,
                'file_name' => $fileName,
            ]);
            $file->move(storage_path() . '/documents/', $fileName);
            return 'ready';
        });
    }
}
