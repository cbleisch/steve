<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AgreementLength extends Model {

    use SoftDeletes;
    public $timestamps = true;
	protected $table = 'agreement_lengths';
	protected $dates = ['deleted_at'];
	protected $fillable = ['name'];

    public function packages() {
        return $this->belongsToMany('App\Models\ProductPackage')->withPivot('installation_fee');
    }
}
