<?php

namespace App\Imports;

use App\Models\UploadFile;
use App\Models\FileData;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FileDataImport implements ToModel, WithHeadingRow
{
    protected $uploadedFile;
   
    public function __construct($uploadedFile)
    {
     
        $this->uploadedFile = $uploadedFile;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new FileData([
            'upload_file_id' =>  $this->uploadedFile->id,
            'name' => $row['name'],
            'email' => $row['email'],
            'department' => $row['department'],
            'title' => $row['title'],
        ]);
    }
}