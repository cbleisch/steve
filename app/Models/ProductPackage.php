<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductPackage extends Model {

    use SoftDeletes;
    public $timestamps = true;
	protected $table = 'product_packages';
	protected $dates = ['deleted_at'];
	protected $fillable = ['name'];

    public function locations()
    {
    	// return $this->hasMany('\App\Models\CustomerLocation');
    }
}
