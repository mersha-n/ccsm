<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attorney extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'attorneyID',
        'Name',
        'courtType',
        'Address',
        'State',
        'EmpType',
        'description',
        'court_id',
    ];

    protected $searchableFields = ['*'];

    public function court()
    {
        return $this->belongsTo(Court::class);
    }

    public function caseHears()
    {
        return $this->hasMany(CaseHear::class);
    }
}
