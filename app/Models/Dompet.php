<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dompet extends Model
{
    use HasFactory;

    protected $table = 'dompet';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
        'referensi',
        'deskripsi',
        'status_id'
    ];

    public function dompet_status()
    {
        return $this->belongsTo(DompetStatus::class);
    }
}
