<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TextScan extends Model
{
    protected $fillable = [
        'id',
        'gebouw',
        'plaats',
        'naam',
        'mail',
        'contactadres',
        'tel',
        'ref-code',
        'aanmaakdatum',
        'urgentie',
        'max-bedrag'
    ];
}
