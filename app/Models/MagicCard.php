<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MagicCard extends Model
{
    use HasFactory;
    public function post(){
        return $this->hasOne(Post::class);
    }
}
