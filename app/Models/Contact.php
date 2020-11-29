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
}
