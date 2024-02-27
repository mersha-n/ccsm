<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wittness extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'wittnessID',
        'name',
        'address',
        'state',
        'wittnessType',
        'description',
    ];

    protected $searchableFields = ['*'];

    public function caseHears()
    {
        return $this->hasMany(CaseHear::class);
    }
}
