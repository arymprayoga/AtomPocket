<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
        'deskripsi',
        'status_id'
    ];

    public function kategori_status()
    {
        return $this->belongsTo(KategoriStatus::class, 'status_id', 'id');
    }
}
