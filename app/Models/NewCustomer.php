<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewCustomer extends Model
{
    use HasFactory;

    public $table = 'new_customers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'tanggal_input',
        'nik',
        'nopen',
        'nama',
        'tanggal_lahir',
        'alamat_jalan',
        'alamat_kec',
        'alamat_kotakab',
        'alamat_propinsi',
        'telepon',
        'pembiayaan',
        'tenor',
        'cicilan',
        'gaji_pokok',
        'status',
        'url_ktp',
        'url_kk',
        'url_karip',
        'url_sk_pensiun',
        'url_video_interview',
        'url_video_kesehatan',
        'tanggal_keputusan',
        'keputusan_bank',
        'keputusan_asuransi',
        'url_pdf',
    ];
}
