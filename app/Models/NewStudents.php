<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewStudents extends Model
{
    use HasFactory;

    public $table = 'new_students';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'gender',
        'birthplace',
        'birthday',
        'address',
        'school',
        'un',
        'indo',
        'mtk',
        'bing',
        'ipa',
        'url_foto',
        'url_ijazah',
        'url_kk',
        'id_user',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
