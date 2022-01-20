<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    use HasFactory;

    protected $table = "tarif";
    protected $fillable = ["daya","tarifperkwh"];

    public function pelanggan()
    {
        return $this->hasMany(Pelanggan::class);
    }
}
