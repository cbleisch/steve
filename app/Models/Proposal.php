<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proposal extends Model {

    use SoftDeletes;
    public $timestamps = true;
	protected $table = 'proposals';
	protected $dates = ['deleted_at'];
	protected $fillable = [];

    
}