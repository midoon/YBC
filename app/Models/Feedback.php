<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table = 'feedbacks';

    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function cafe(){
        return $this->belongsTo(Cafe::class);
    }
}
