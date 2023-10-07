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
        'project_name',
        'slug',
        'project_division',
        'project_client',
        'project_status',
        'project_budget',
        'project_description',
    ];

    public $timestamps = false;
}
