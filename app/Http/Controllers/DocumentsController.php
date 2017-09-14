<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Plupload;
use App\Document;
use Auth;

class DocumentsController extends Controller
{
    public function show(Document $document){
       
    }

    public function upload(Request $request){
        $user = Auth::user();

        return Plupload::receive('file', function ($file) use ($user, $request)
        {
            $fileName = md5(uniqid()).'.'.$file->extension();
            if($request->has('id')){
                $document = Document::find($request->id);
                if(!$document)
                    return ['document not found'];
                $oldFileName = $document->file_name;
                if(file_exists(storage_path().'/documents/'.$oldFileName))
                    unlink(storage_path().'/documents/'.$oldFileName);
                $document->file_name = $fileName;
                $document->title = $request->title;
                $document->save();
            } else {
                $document = $user->documents()->create([
                    'title' => $request->title,
                    'type' => strtoupper($request->type),
                    'file_name' => $fileName,
                ]);
            }

            $file->move(storage_path() . '/documents/', $fileName);

            return ['id' => $document->id];
        });
    }

    public function destroy(Document $document){
        //todo policy
        
        if(file_exists(storage_path().'/documents/'.$document->file_name))
            unlink(storage_path().'/documents/'.$document->file_name);
        $document->delete();
        return response(['status' => 'success']);
    }
}
