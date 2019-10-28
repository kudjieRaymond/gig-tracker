<?php

namespace App\Traits;

trait Multitenantable {
	
	protected static function bootMultitenantable()
	{
		if(auth()->check()){
			static::creating(function($model){
				$model->created_by = auth()->id();
			});
		}	
	}
}