<?php

namespace App\Models\v1\_Master;
use App\Models\v1\_Master\ref_sex;
use App\Models\v1\_Config\cf_ortus;
use App\Models\v1\_Config\cf_balita;
use App\Models\v1\_Tumbang\trx_pertumbuhan;

use Illuminate\Database\Eloquent\Model;

class ref_balita extends Model
{
    protected $table = 'ref_balita';

    protected $fillable = [
        'id',
        'nika',
        'no_rm',
        'name',
        'sex_id',
        'pob',
        'dob',
        'birth_weight',
        'birth_height',
        'head_circ',
        'status',
        'ortu_id'
    ];

    public function refSex()
    {
        return $this->hasOne(ref_sex::class, 'id', 'sex_id');
    }

    public function refOrtu()
    {
        return $this->hasOne(ref_ortu::class, 'id', 'ortu_id');
    }
}
