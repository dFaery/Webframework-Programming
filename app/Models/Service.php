<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    // protected $table = 'services';
    // protected $primaryKey = 'id';
    // public $incrementing = true;
    // protected $keyType = 'int';
    // public $timestamps = true;
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function transactions()
    {
        return $this->belongsToMany(Transaction::class);
    }
}
