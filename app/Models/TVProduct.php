<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TVProduct extends Model {

    use SoftDeletes;
	public $timestamps = true;
	protected $table = 'tv_products';
	protected $dates = ['deleted_at'];
	protected $fillable = ['name', 'spp', 'dpp', 'tpp'];

    public function locations()
    {
    	// return $this->hasMany('\App\Models\CustomerLocation');
    }
}
