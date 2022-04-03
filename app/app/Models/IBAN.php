<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IBAN extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'iban_codes';
    protected $fillable = [
        '_method',
        'code',
        'eco_code',
        'locality_code'
    ];
}
