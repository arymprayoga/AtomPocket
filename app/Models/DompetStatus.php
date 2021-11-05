<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DompetStatus extends Model
{
    use HasFactory;

    protected $table = 'dompet_status';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
    ];

    public function dompet()
    {
        return $this->hasMany(Dompet::class, 'id', 'status_id');
    }
}
