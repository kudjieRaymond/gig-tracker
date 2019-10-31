<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Multitenantable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Document extends Model implements HasMedia
{
	use SoftDeletes, Multitenantable, HasMediaTrait;
	
  protected $fillable = [
        'name',
        'project_id',
        'created_at',
        'updated_at',
        'deleted_at',
				'description',
				'created_by'
		];
		
		public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
		}
		
		/**
     * Register the conversions that should be performed.
     *
     * @return array
     */
    public function registerMediaConversions(Media $media = null)
    {
         $this->addMediaConversion('thumb')->width(50)->height(50);
		}
		
		 public function getDocumentFileAttribute()
    {
        return $this->getMedia('document_file')->last();
    }

}