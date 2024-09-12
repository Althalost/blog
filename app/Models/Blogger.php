<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Blogger extends Model
{
    use HasFactory;

    protected $fillable = [
        'presentation',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
