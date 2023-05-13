<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GetBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'library_id',
        'startTime',
        'dueTime'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Library(){
        return $this->belongsTo(Library::class, 'library_id');
    }
}
