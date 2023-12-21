<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $timestamps = false; // Отключение автоматического добавления временных меток

    use HasFactory;

    // Определение связи "многие к одному" с моделью User
    public function User() {
        return $this->belongsTo(User::class);
    }
}

