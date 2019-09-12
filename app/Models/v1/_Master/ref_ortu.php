<?php

namespace App\Models\v1\_Master;
use App\Models\v1\_Master\ref_sex;
use App\Models\v1\_Config\cf_users;

use Illuminate\Database\Eloquent\Model;

class ref_ortu extends Model
{
    protected $table = 'ref_ortu';

    protected $fillable = [
        'id',
        'nik',
        'no_kk',
        'name',
        'sex_id',
        'pob',
        'dob',
        'phone',
        'email',
        'address',
        'user_id'
    ];

    public function refSex()
    {
        return $this->hasOne(ref_sex::class, 'id', 'sex_id');
    }

    public function cfUser()
    {
        return $this->hasOne(cf_users::class, 'id', 'user_id');
    }
}
