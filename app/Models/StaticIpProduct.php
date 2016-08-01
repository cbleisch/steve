<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StaticIpProduct extends Model {

    use SoftDeletes;
    public $timestamps = true;
	protected $table = 'static_ip_products';
	protected $dates = ['deleted_at'];
	protected $fillable = ['name', 'spp', 'dpp', 'tpp'];

    public function packages() {
        return $this->belongsToMany('App\Models\ProductPackage', 'product_package_static_ip_product')->withPivot('price');
    }
}
