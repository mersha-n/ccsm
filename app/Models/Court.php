<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Court extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'courtID',
        'name',
        'courtType',
        'speciality',
        'description',
    ];

    protected $searchableFields = ['*'];

    public function attorneys()
    {
        return $this->hasMany(Attorney::class);
    }

    public function judges()
    {
        return $this->hasMany(Judge::class);
    }

    public function bars()
    {
        return $this->hasMany(Bar::class);
    }

    public function caseHears()
    {
        return $this->hasMany(CaseHear::class);
    }
}
