<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductPackage extends Model {

    use SoftDeletes;
    public $timestamps = true;
    protected $table = 'product_packages';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name',
        'voice_lines_under_four_price',
        'voice_lines_over_four_price',
        'phone_activation_fee',
        'additional_tv_outlet_price',
        'hd_tv_per_outlet_price'
    ];

    public function internetProducts() {
        return $this->belongsToMany('App\Models\InternetProduct')->withPivot('price');
    }
    
    public function voiceProducts() {
        return $this->belongsToMany('App\Models\VoiceProduct')->withPivot('price');
    }

    public function tvProducts() {
        return $this->belongsToMany('App\Models\TvProduct')->withPivot('price');
    }

    public function staticIpProducts() {
        return $this->belongsToMany('App\Models\StaticIpProduct')->withPivot('price');
    }

    public function agreementLengths() {
        return $this->belongsToMany('App\Models\AgreementLength')->withPivot('installation_fee');
    }
}
