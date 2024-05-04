<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileData extends Model
{
    use HasFactory;
    protected $table = 'file_data';
    protected $fillable = [
        'upload_file_id',
        'name',
        'email',
        'department',
        'title',
    ];
    
}