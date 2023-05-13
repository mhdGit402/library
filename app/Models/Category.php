<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Library;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];

    public function libraries(){
        return $this->hasMany(Library::class);
    }
}
