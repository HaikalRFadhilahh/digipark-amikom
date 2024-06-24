<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HistoryParkir extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kartuMahasiswa(): BelongsTo
    {
        return $this->belongsTo(KartuMahasiswa::class, 'id_kartu', 'id');
    }
}
