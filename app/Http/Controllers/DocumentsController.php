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
    public function GetDocuments(int $user_id = 0){
        if($user_id){
            $user = User::findOrFail($user_id);
        } else {
            $user = Auth::user();
        }

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

        $arr = explode('.', $document->file_name);
        $ext = end($arr);
        switch (strtolower($ext)){
            case 'jpeg':
            case 'jpg':
            case 'png':
                if (file_exists(storage_path().'/documents/'.$document->file_name)) {
                    header("Content-type: image/jpg");
                    readfile(storage_path().'/documents/'.$document->file_name);
                }
                break;
            case 'pdf':
                header("Content-type: image/jpg");
                readfile('img/PDF_logo.png');
                break;
            case 'doc':
            case 'docx':
                header("Content-type: image/jpg");
                readfile('img/Word-icon_thumb.png');
                break;
            default:
                header("Content-type: image/jpg");
                readfile('img/document.png');
        }
        exit;
    }

    public function upload(Request $request){
        //todo policy

        if($request->user_id){
            $user = User::findOrFail($request->user_id);
        } else {
            $user = Auth::user();
        }

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

            if(in_array($file->extension(), ['png', 'jpg', 'jpeg'])){
                $image = new \Imagick($fileName);
                $this->autoRotateImage($fileName);
                $image->writeImage($fileName);
            }

            $file->move(storage_path() . '/documents/', $fileName);

            return ['id' => $document->id, 'type' => $request->type];
        });
    }

    public function download(Document $document){

        if(file_exists(storage_path().'/documents/'.$document->file_name)){
            header("Content-Type: application/octet-stream");
            header("Content-Transfer-Encoding: Binary");
            header("Content-disposition: attachment; filename=\"" . basename($document->file_name) . "\"");
            echo readfile(storage_path().'/documents/'.$document->file_name); // do the double-download-dance (dirty but worky)
        }
    }
    
    public function update(Document $document, Request $request){
        if($request->has('title'))
            $document->title = $request->title;
        if($request->has('date'))
            $document->date = $request->date;
        $document->save();
        return response(['status' => 'success']);
    }

    public function destroy(Document $document){
        //todo policy
        
        if(file_exists(storage_path().'/documents/'.$document->file_name))
            unlink(storage_path().'/documents/'.$document->file_name);
        $document->delete();
        return response(['status' => 'success']);
    }

    private function autoRotateImage($image) {
        $orientation = $image->getImageOrientation();

        switch($orientation) {
            case \imagick::ORIENTATION_BOTTOMRIGHT:
                $image->rotateimage("#000", 180); // rotate 180 degrees
                break;

            case \imagick::ORIENTATION_RIGHTTOP:
                $image->rotateimage("#000", 90); // rotate 90 degrees CW
                break;

            case \imagick::ORIENTATION_LEFTBOTTOM:
                $image->rotateimage("#000", -90); // rotate 90 degrees CCW
                break;
        }

        // Now that it's auto-rotated, make sure the EXIF data is correct in case the EXIF gets saved with the image!
        $image->setImageOrientation(\imagick::ORIENTATION_TOPLEFT);
    }
}
