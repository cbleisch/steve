<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proposal extends Model {

    use SoftDeletes;
    public $timestamps = true;
	protected $table = 'proposals';
	protected $dates = ['deleted_at'];
	protected $fillable = [
		'customer',
		'product_package_id',
		'agreement_length_id',
		'internet_product_id',
			'internet_product_price',
			'internet_product_price_extended',
			'modem_rental_price',
			'modem_rental_price_extended',
		'static_ip_product_id',
			'static_ip_product_price',
			'static_ip_product_price_extended',
		'voice_lines_under_four_qty',
			'voice_lines_under_four_price',
			'voice_lines_under_four_price_extended',
		'voice_lines_over_four_qty',
			'voice_lines_over_four_price',
			'voice_lines_over_four_price_extended',
		'tv_product_id',
			'tv_product_price',
			'tv_product_price_extended',
		'additional_tv_outlets_qty',
			'additional_tv_outlets_price',
			'additional_tv_outlets_price_extended',
		'additional_hd_outlets_qty',
			'additional_hd_outlets_price',
			'additional_hd_outlets_price_extended',
		'standard_installation_fee_price',
			'standard_installation_fee_price_extended',
		'phone_activation_qty',
			'phone_activation_price',
			'phone_activation_price_extended',
		'total_monthly_charges',
		'total_one_time_charges'
	];
    
    public function agreementLength() {
        return $this->belongsTo('App\Models\AgreementLength');
    }

    public function staticIpProduct() {
        return $this->belongsTo('App\Models\StaticIpProduct');
    }

    public function internetProduct() {
        return $this->belongsTo('App\Models\InternetProduct');
    }

    public function tvProduct() {
        return $this->belongsTo('App\Models\TvProduct');
    }
}
