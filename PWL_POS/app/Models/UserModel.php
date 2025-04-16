<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable; // implementasi class Authenticatable

class UserModel extends Authenticatable
{
    use HasFactory;

    protected $table = 'm_user';
    protected $primaryKey = 'user_id';

    protected $fillable = ['level_id', 'username', 'nama', 'password'];
    // mendaftarkan atribut (nama kolom) yang digunakan ketika insert atau update

    // protected $guarded = ['created_at'];
    // akan mengabaikan kolom yang dimasukkan

    protected $hidden = ['password']; // jangan ditampilkan saat select
    protected $casts = ['password' => 'hashed']; // casting password agar otomatis dihash

    public function level(): BelongsTo {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }
}
