<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

       /**
     * @var array
     */
    protected $fillable = [
        'name',
        'categories',
        'amount',
        'monthly_orders',
    ];

    /**
     * @return mixed
     */
    public function companies()
    {
        return $this->hasMany(Company::class, 'plan_id');
    }
}
