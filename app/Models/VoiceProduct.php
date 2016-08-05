<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VoiceProduct extends Model {

    use SoftDeletes;
    public $timestamps = true;
    protected $table = 'voice_products';
    protected $dates = ['deleted_at'];
    protected $fillable = ['name'];

    public function packages() {
        return $this->belongsToMany('App\Models\ProductPackage')->withPivot('price');
    }
}
