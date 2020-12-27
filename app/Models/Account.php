<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'domain',
        'pinned',
        'created_by',
        'status',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }

    public function companies()
    {
        return $this->hasMany('App\Models\Company', 'account_id', 'id');
    }

    public function contacts()
    {
        return $this->hasMany('App\Models\Contact', 'account_id', 'id');
    }

    public static function getAccount()
    {
        return Account::where('created_by', Auth::id())->with(['user', 'companies'])->first();
    }
}
