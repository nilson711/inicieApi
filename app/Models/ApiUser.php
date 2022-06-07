<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'gender',
        'status',
    ];

    public function rules() {
        return [
            'name' => 'required|unique:users,name|min:3',
            'email' => 'required|unique:users,email',
            'gender' => 'required',
            'status' => 'required',
        ];
    }

    public function feedback() {
        return [
            'required' => 'O campo é requerido',
            'min' => 'O campo requer pelo menos 3 caracteres',
        ];
    }

    public function posts(){
        return $this->hasMany('App\Models\Post');
    }
}
