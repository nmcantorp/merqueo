<?php namespace App\Http\Controllers;

use App\Characters_Upload;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Upload;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Auth;

class UploadsController extends Controller {

    public function getIndex()
    {
        return view('uploads');
    }

    public function postSave()
    {
        $result = [];
        if(!\Input::file("file"))
        {
            return redirect('uploads')->with('error-message', 'File has required field');
        }

        $mime = \Input::file('file')->getMimeType();
        $extension = strtolower(\Input::file('file')->getClientOriginalExtension());
        $fileName = uniqid().'.'.$extension;
        $path = "files_uploaded";

        switch ($mime)
        {
            case "text/plain":
                if (\Request::file('file')->isValid())
                {
                    \Request::file('file')->move($path, $fileName);

                    $content = \File::get($path.'/'.$fileName);
                    $content = explode("\r\n" , $content);

                    $upload = new Upload();
                    $upload->filename = $fileName;
                    $upload->user_creator = \Auth::user()->id;
                    if($upload->save())
                    {
                        $this->saveCharacters($content, $result, $upload);


                        return redirect('uploads')->with('success-message', 'File has been uploaded');
                    }


                    else
                    {
                        \File::delete($path."/".$fileName);
                        return redirect('uploads')->with('error-message', 'An error ocurred saving data into database');
                    }
                }
                break;
            default:
                return redirect('uploads')->with('error-message', 'Extension file is not valid');
        }
    }

    /**
     * @param $content
     * @param $foo
     * @param $result
     * @param $upload
     */
    public function saveCharacters($content, $result, $upload)
    {
        if (count($content) > 0) {
            foreach ($content as $value) {
                echo $value;
                $string = preg_match_all('/([A-Z]{1})/', $value, $foo);

                $result[] = $foo[0];

            }
            $max = 0;
            for ($i = 0; $i < count($result); $i++) {
                if ($max < count($result[$i])) {
                    $max = count($result[$i]);
                    $key_max = $i;
                }
            }

            for ($i = 0; $i < count($result[$key_max]); $i++) {
                $character = new Characters_Upload();
                $character->character = $result[$key_max][$i];
                $character->count = $i;
                $character->upload_id = $upload->id;
                $character->save();
            }
        }
    }
}
