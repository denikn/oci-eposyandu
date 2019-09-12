<?php

namespace App\Models\v1\_Master;

use Illuminate\Database\Eloquent\Model;

class ref_sex extends Model
{
    protected $table = 'ref_sex';

    protected $fillable = [
        'id',
        'name',
        'active'
    ];
}
