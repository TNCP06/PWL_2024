<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable; 
use Tymon\JWTAuth\Contracts\JWTSubject;// implementasi class Authenticatable

class UserModel extends Authenticatable implements JWTSubject
{
    use HasFactory;

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    protected $table = 'm_user';
    protected $primaryKey = 'user_id';

    protected $fillable = ['level_id', 'username', 'nama', 'password', 'profile_photo','created_at', 'updated_at'];
    // protected $fillable = ['level_id', 'username', 'nama', 'password'];
    // mendaftarkan atribut (nama kolom) yang digunakan ketika insert atau update

    // protected $guarded = ['created_at'];
    // akan mengabaikan kolom yang dimasukkan

    protected $hidden = ['password']; // jangan ditampilkan saat select
    protected $casts = ['password' => 'hashed']; // casting password agar otomatis dihash

    public function level(): BelongsTo { // relasi ke table level
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }

    // Mendapatkan nama role
    public function getRoleName(): String {
        return $this->level->levelnama;
    }

    // Cek apakah user memiliki role tertentu
    public function hasRole($role): bool {
        return $this->level->level_kode == $role;
    }

    // Mendapatkan kode role
    public function getRole() {
        return $this->level->level_kode;
    }
}
