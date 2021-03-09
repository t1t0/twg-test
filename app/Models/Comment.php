<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function commentedTo(){
        return $this->belongsTo(Publication::class, 'publication_id', 'id');
    }

    public function commentedBy(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function approve(){
        $this->status = true;
        $this->save();
    }
}
