<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductPackage extends Model {

    use SoftDeletes;
    public $timestamps = true;
    protected $table = 'product_packages';
    protected $dates = ['deleted_at'];
    protected $fillable = ['name'];

    public function internetProducts() {
        return $this->belongsToMany('App\Models\InternetProduct');
    }
    
    public function voiceProducts() {
        return $this->belongsToMany('App\Models\VoiceProduct');
    }

    public function tvProducts() {
        return $this->belongsToMany('App\Models\TVProduct');
    }

    public function staticIPProducts() {
        return $this->belongsToMany('App\Models\TVProduct');
    }
}
