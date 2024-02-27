<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CaseCharge extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'deptName',
        'mid',
        'rank',
        'name',
        'address',
        'state',
        'crimeDescription',
        'crimeDate',
        'ChargeDate',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'case_charges';

    protected $casts = [
        'crimeDate' => 'datetime',
        'ChargeDate' => 'datetime',
    ];

    public function caseHears()
    {
        return $this->hasMany(CaseHear::class);
    }
}
