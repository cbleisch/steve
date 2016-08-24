<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProposalDate extends Model {

    use SoftDeletes;
    public $timestamps = true;
    protected $table = 'proposal_dates';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'date'
    ];

    
}
