<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chapter extends Model
{
    use hasFactory;
    protected $fillable = [
        'title',
        'description',
        'published',
    ];

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }


    use HasFactory;
}
