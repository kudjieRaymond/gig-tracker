<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Multitenantable;

class Note extends Model
{
	use SoftDeletes, Multitenantable;

  protected $fillable = [
        'note_text',
        'project_id',
        'created_at',
        'updated_at',
				'deleted_at',
				'created_by',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
		}
		public function user()
    {
        return $this->belongsTo(User::class);
    }
}