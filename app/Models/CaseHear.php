<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CaseHear extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'CaseID',
        'casename',
        'fileNumber',
        'address',
        'state',
        'location',
        'caseStartDate',
        'description',
        'court_id',
        'judge_id',
        'attorney_id',
        'case_charge_id',
        'wittness_id',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'case_hears';

    protected $casts = [
        'caseStartDate' => 'datetime',
    ];

    public function court()
    {
        return $this->belongsTo(Court::class);
    }

    public function judge()
    {
        return $this->belongsTo(Judge::class);
    }

    public function attorney()
    {
        return $this->belongsTo(Attorney::class);
    }

    public function caseCharge()
    {
        return $this->belongsTo(CaseCharge::class);
    }

    public function wittness()
    {
        return $this->belongsTo(Wittness::class);
    }

    public function decisions()
    {
        return $this->hasMany(Decision::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
