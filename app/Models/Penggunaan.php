<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penggunaan extends Model
{
    use HasFactory;

    protected $table = "penggunaan";
    protected $fillable = ["user_id","bulan","tahun","meter_awal","meter_akhir"];

    public function tagihan()
    {
        return $this->hasOne(Tagihan::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
