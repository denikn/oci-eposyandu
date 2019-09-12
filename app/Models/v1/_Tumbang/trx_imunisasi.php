<?php

namespace App\Models\v1\_Tumbang;
use App\Models\v1\_Master\ref_imunisasi;
use App\Models\v1\_Config\cf_users;

use Illuminate\Database\Eloquent\Model;

class trx_imunisasi extends Model
{
    protected $table = 'trx_imunisasi';

    protected $fillable = [
        'id',
        'visit_date',
        'imunisasi_id',
        'place'
    ];

    // public function refSex()
    // {
    //     return $this->hasOne(ref_sex::class, 'id', 'sex_id');
    // }

    public function refImunisasi()
    {
        return $this->hasOne(ref_imunisasi::class, 'id', 'imunisasi_id');
    }

    
}
