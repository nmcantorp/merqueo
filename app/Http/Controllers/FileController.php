<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FileController extends Controller {

    public function getIndex()
    {
        $file = DB::table('uploads')
            ->join('users', 'uploads.user_creator', '=', 'users.id')
            ->select('uploads.id', 'uploads.filename', 'users.name' )
            ->get();
        return view('file_list', [
            'files' => $file
        ]);
    }

    public function getDetails($id){
        $file_details = DB::table('uploads')
            ->join('users', 'uploads.user_creator', '=', 'users.id')
            ->join('characters_uploads', 'characters_uploads.upload_id', '=', 'uploads.id')
            ->where('characters_uploads.upload_id', '=', $id)
            ->get();
        return view('file_list_detail', [
            'files' => $file_details
        ]);
    }

}
