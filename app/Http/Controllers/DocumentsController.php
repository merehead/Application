<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Plupload;
use App\Document;
use Auth;
use DB;

class DocumentsController extends Controller
{
    public function GetDocuments(){
        $user = Auth::user();
//        $user = User::find(92);
        $sql = "SELECT DISTINCT type FROM documents WHERE user_id = $user->id";
        $res = DB::select($sql);
        $types = array_pluck($res, 'type');

        $documents = array();
        foreach ($types as $type){
            $documents[$type] = $user->documents()->where('type', $type)->get()->toArray();
        }


        return response(
            [
                'status' => 'success',
                'data' => [
                    'documents' => $documents
                ]
        ]);
    }

    public function getDocument(Document $document){
        return response(
            [
                'status' => 'success',
                'data' => [
                    'document' => $document
                ]
        ]);
    }

    public function getPreview(Document $document){
        if (file_exists(storage_path().'/documents/'.$document->file_name)) {
            header("Content-type: image/jpg");
            readfile(storage_path().'/documents/'.$document->file_name);
            exit;
        }
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
