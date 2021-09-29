<?php

namespace App\Http\Controllers;

use App\File;
use App\Services\Uploader\Uploader;
use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * @var Uploader
     */
    private $uploader;



    public function __construct(Uploader $uploader)
    {
        $this->uploader = $uploader;

    }


    public function index()
    {
        $files = File::all();

        return view('files.index', compact('files'));
    }

    public function show(File $file)
    {
        return $file->download();
    }

    public function create()
    {
        return view('files.create');
    }

    public function delete(File $file)
    {

        $file->delete();

        return back();

    }


    public function new(Request $request)
    {

        try{

            $this->validateFile($request);

            $this->uploader->upload();

            return redirect()->back()->withSuccess('File has uploaded successfully');
        }catch(\Exception $e){

            return redirect()->back()->withError($e->getMessage());
        }


    }


    private function validateFile($request)
    {
        $request->validate([
            'file' => ['required', 'file', 'mimetypes:image/jpeg,video/mp4,application/zip']
        ]);
    }
}
