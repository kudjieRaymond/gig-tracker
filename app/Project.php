<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Multitenantable;
use Carbon\Carbon;

class Project extends Model
{
	use SoftDeletes, Multitenantable;
		
   protected $fillable = [
        'name',
        'budget',
				'client_id',
				'created_by',
        'status_id',
        'start_date',
        'created_at',
        'updated_at',
        'deleted_at',
        'description',
		];
		
		 public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
		}
		
		public function status()
    {
        return $this->belongsTo(ProjectStatus::class, 'status_id');
		}
		
		public function documents()
    {
        return $this->hasMany(Document::class);
		}
		
		public function getStartDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('Y-m-d') : null;
    }

    public function setStartDateAttribute($value)
    {
				$value = Carbon::parse($value);

		   $this->attributes['start_date'] = $value ? $value->format('Y-m-d') : null;
    }

}