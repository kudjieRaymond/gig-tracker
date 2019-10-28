<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Multitenantable;

class IncomeSource extends Model
{

	use SoftDeletes, Multitenantable;
	
	protected $fillable = [
				'name',
				'created_by',
        'created_at',
        'updated_at',
        'deleted_at',
        'fee_percent',
    ];
}