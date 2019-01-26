<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'price', 'total_in_shelf', 'total_in_vault', 'store_id',
    ];

    /**
     * Get the store that owns the article.
     */
    public function store()
    {
        return $this->belongsTo('App\Store');
    }
}
