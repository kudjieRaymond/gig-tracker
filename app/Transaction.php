<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Multitenantable;
use Carbon\Carbon;

class Transaction extends Model
{
     use SoftDeletes, Multitenantable;


    protected $fillable = [
        'name',
        'amount',
        'project_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'currency_id',
        'description',
        'income_source_id',
        'transaction_date',
        'transaction_type_id',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function transaction_type()
    {
        return $this->belongsTo(TransactionType::class);
    }

    public function income_source()
    {
        return $this->belongsTo(IncomeSource::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function getTransactionDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('Y-m-d') : null;
    }

    public function setTransactionDateAttribute($value)
    {
				$value = Carbon::parse($value);

		   $this->attributes['transaction_date'] = $value ? $value->format('Y-m-d') : null;
    }
}