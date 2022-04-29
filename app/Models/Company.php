<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

      /**
     * @var array
     */
    protected $fillable = [
        'name',
        'country',
        'plan_id',  
        'location',
        'logo_url',
    ];

    protected static function booting()
    {
        parent::booting();

        self::creating(function ($model) {
            if ( is_null($model->logo_url) ) {
                $model->logo_url = '';
            }
        });
    }

    /**
     * @return mixed
     */
    public function toSearchableArray()
    {
        return $this->toArray();
    }


    /**
     * @return mixed
     */
    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }

    /**
     * @return mixed
     */
    public function users()
    {
        return $this->hasMany(User::class, 'company_id');
    }
}
