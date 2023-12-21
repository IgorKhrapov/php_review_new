<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{

    use HasFactory;

    // Поля, доступные для массового заполнения
    public $fillable = [
        'name',
        'surname',
        'email',
        'password',
    ];

    // Определение связи "один к одному" с моделью Contact
    public function Contact() {
        return $this->hasOne(Contact::class);
    }

    // Атрибутный мутатор для хеширования пароля перед сохранением в базу данных
    public function setPasswordAttribute ($password){
        $this->attributes['password'] = Hash::make($password);
    }
}
