<?php

namespace App\Models\v1\_Tumbang;
use App\Models\v1\_Master\ref_balita;
use App\Models\v1\_Master\ref_posyandu;
use App\Models\v1\_Config\cf_users;

use Illuminate\Database\Eloquent\Model;

class trx_pertumbuhan extends Model
{
    protected $table = 'trx_pertumbuhan';

    protected $fillable = [
        'id',
        'visit_date',
        'posyandu_id',
        'balita_id',
        'weight',
        'height',
        'head_circ'
    ];

    // public function refSex()
    // {
    //     return $this->hasOne(ref_sex::class, 'id', 'sex_id');
    // }

    public function refBalita()
    {
        return $this->hasOne(ref_balita::class, 'id', 'balita_id');
    }

    public function refPosyandu()
    {
        return $this->hasOne(ref_posyandu::class, 'id', 'posyandu_id');
    }

    
}
