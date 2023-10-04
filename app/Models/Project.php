<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $primaryKey = 'project_id';

    protected $fillable = [
        'id',
        'nama',
        'tim',
        'klien',
        'status',
        'anggaran',
        'deskripsi',
    ];

    public $timestamps = false;
}
