<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'job_title',
        'lead_status_id',
        'company_associated',
        'account_id',
        'company_id',
        'description',
        'phone',
        'landline',
        'fax',
        'avatar',
        'address',
        'postcode',
        'state',
        'country',
        'created_by',
        'status',
        'created_at',
        'updated_at',
    ];

    public function account()
    {
        return $this->belongsTo('App\Models\Account', 'account_id', 'id');
    }
    public function company()
    {
        return $this->belongsTo('App\Models\Company', 'company_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\Company', 'created_by', 'id');
    }
}
