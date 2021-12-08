<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Games extends Model
{
    use HasFactory;
    protected $table = 'games';
    protected $fillable = [
        'name',
        'description',
        'ownerID',
        'categorie',
        'price',
    ];

     /**
     * Get the post that owns the comment.
     */
    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
