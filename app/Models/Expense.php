<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'user_id',
        'status',
        'name'
    ];

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
