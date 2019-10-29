<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Multitenantable;

class Currency extends Model
{
		use SoftDeletes , Multitenantable;

    protected $fillable = [
        'name',
        'code',
        'created_at',
        'updated_at',
        'deleted_at',
        'main_currency',
    ];
}