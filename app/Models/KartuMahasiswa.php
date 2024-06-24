<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class KartuMahasiswa extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $guarded = ['id'];

    public function parkirMahasiswa(): HasMany
    {
        return $this->hasMany(ParkirMahasiswa::class);
    }

    public function historyParkir(): HasMany
    {
        return $this->hasMany(HistoryParkir::class);
    }
}
