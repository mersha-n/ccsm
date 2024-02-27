<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['date', 'Description', 'case_hear_id'];

    protected $searchableFields = ['*'];

    protected $casts = [
        'date' => 'datetime',
    ];

    public function caseHear()
    {
        return $this->belongsTo(CaseHear::class);
    }
}
