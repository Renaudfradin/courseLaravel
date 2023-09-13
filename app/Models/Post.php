<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    //protected $fillable = ['title', 'excerpt', 'body', 'id'];

    public function categorie(): BelongsTo{
        return $this->belongsTo(Categorie::class);
    }
}
