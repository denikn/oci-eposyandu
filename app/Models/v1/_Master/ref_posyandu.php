<?php

namespace App\Models\v1\_Master;
use App\Models\v1\_Master\ref_sex;
use App\Models\v1\_Config\cf_users;

use Illuminate\Database\Eloquent\Model;

class ref_posyandu extends Model
{
    protected $table = 'ref_posyandu';

    protected $fillable = [
        'id',
        'code',
        'name',
        'puskesmas_code'
    ];

}
