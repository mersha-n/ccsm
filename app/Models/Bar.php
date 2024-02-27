<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bar extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'address',
        'state',
        'location',
        'description',
        'court_id',
    ];

    protected $searchableFields = ['*'];

    public function court()
    {
        return $this->belongsTo(Court::class);
    }
}
