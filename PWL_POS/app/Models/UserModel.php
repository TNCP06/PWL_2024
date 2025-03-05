<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'm_user';
    protected $primaryKey = 'user_id';

    protected $fillable = ['level_id', 'username', 'nama', 'password'];
    // mendaftarkan atribut (nama kolom) yang digunakan ketika insert atau update

    // protected $guarded = ['created_at'];
    // akan mengabaikan kolom yang dimasukkan
}
