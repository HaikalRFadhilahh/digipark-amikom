<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ParkirMahasiswa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeMasukTanpaKeluar($query)
    {
        return $query->where('status', 'masuk')
            ->whereNotExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('parkir_mahasiswas as p2')
                    ->whereColumn('p2.id_kartu', 'parkir_mahasiswas.id_kartu')
                    ->where('p2.status', 'keluar')
                    ->whereColumn('p2.created_at', '>', 'parkir_mahasiswas.created_at');
            });
    }

    public function kartuMahasiswa(): BelongsTo
    {
        return $this->belongsTo(KartuMahasiswa::class);
    }
}
