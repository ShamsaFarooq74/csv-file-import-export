<?php

namespace App\Http\Controllers;
use App\Models\UploadFile;
use App\Models\FileData;
use App\Imports\FileDataImport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $filedata = FileData::all();
        return view('upload-file',compact('filedata'));
    }
    public function importFile(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx|max:10240', 
        ]);
    
        $fileExt = $request->file('file')->getClientOriginalName();
        $filename = pathinfo($fileExt, PATHINFO_FILENAME);
        $extension = $request->file('file')->getClientOriginalExtension();
        
        $filenameToStore = $filename . '-' . time() . '.' . $extension;
       
        $path = $request->file('file')->storeAs('public/uploadfiles', $filenameToStore);
        $uploadedFile = UploadFile::create([
            'file' => $filenameToStore,
            'path' => $path,
        ]);
        Excel::import(new FileDataImport($uploadedFile), storage_path('app/' . $path));
        
        return redirect('/')->with('success', 'File uploaded successfully.');
    }
    public function fileindex()
    {
        $files = UploadFile::all();
        return view('files', compact('files'));
    }

    public function viewFile($id)
    {
        $filedata = FileData::where('upload_file_id', $id)->get();
        return view('file-record', compact('filedata'));
    }
    

}