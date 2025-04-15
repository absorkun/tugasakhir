<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pemilik extends Model
{
    /** @use HasFactory<\Database\Factories\PemilikFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama',
        'nomor_ktp',
        'tanggal_lahir',
        'alamat',
        'nomor_telepon',
    ];

    public function kendaraans(): HasMany
    {
        return $this->hasMany(Kendaraan::class);
    }

    public function tagihans(): HasMany
    {
        return $this->hasMany(Tagihan::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
