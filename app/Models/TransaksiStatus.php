<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiStatus extends Model
{
    use HasFactory;

    protected $table = 'transaksi_status';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id', 'status_id');
    }
}
