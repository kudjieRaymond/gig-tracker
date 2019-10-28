<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Multitenantable;

class Client extends Model
{
	use SoftDeletes , Multitenantable;

	protected $fillable = [
				'phone',
        'skype',
        'company',
        'email',
        'website',
        'country',
        'last_name',
				'status',
				'created_by',
        'first_name',
        'created_at',
        'updated_at',
        'deleted_at',
		];
		
		
}