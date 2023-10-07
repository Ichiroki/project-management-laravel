<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Division extends Model
{
    protected $table = 'divisions';

    protected $primaryKey = 'id';

    protected $fillable = ['nama', 'user'];

    protected $casts = [
        'user' => 'json'
    ];

    /**
     * Get all of the user for the Division
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }

    use HasFactory;
}
