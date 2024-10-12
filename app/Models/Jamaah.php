<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Jamaah extends Model
{
    use HasFactory;
    protected $table = 'jamaahs';
    protected $fillable = [
        'nama_lengkap',
        'nik',
        'tempat_lahir',
        'tgl_lahir',
        'alamat',
        'province_id',
        'city_id',
        'district_id',
        'village_id',
        'jenis_kelamin',
        'no_paspor',
        'masa_berlaku_paspor',
        'ktp',
        'kk',
        'foto_diri',
        'paspor',
        'no_visa',
        'berlaku_sampai',
        'jenis_paket',
        'jenis_kamar',
    ];

    protected $casts = [
        'tgl_lahir' => 'date',
        'masa_berlaku_paspor' => 'date',
        'berlaku_sampai' => 'date',
    ];

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function village(): BelongsTo
    {
        return $this->belongsTo(Village::class, 'village_id');
    }
}
