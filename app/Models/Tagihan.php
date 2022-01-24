<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;

    protected $table = "tagihan";
    protected $fillable = ["penggunaan_id","user_id","bulan","tahun","jumlah_meter","status"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function penggunaan()
    {
        return $this->belongsTo(Penggunaan::class);
    }

    public function Pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }
}
