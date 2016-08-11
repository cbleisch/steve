@extends('layouts.printLayout')

@section('styles')
<style type="text/css">

    .form-inline {
        width: 100%;
    }

	.form-inline .form-control {
		width: 100%;
	}

    #item-form .form-inline .has-feedback .form-control-feedback {
        top: 25px;
    }

    #item-form .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 34px;
    }

    .select2 {
        width: 100% !important;
    }

    .block-flat .content h4 {
        margin-top: initial;
        line-height: 16px;
    }

    .bg-warning {
        background-color: #ffe871;
        margin: 0px -16px;
        padding: 6px 0;
    }

    .total {
        border-top: 1px solid #000;
        border-bottom-style: double;
    }
</style>
@stop

@section('breadcrumbs')
<!-- <li><a href="{{ URL::route('proposal.index.get') }}">Proposal Products</a></li>
<li class="active">{{ $proposal->id ? 'Print' : 'Create'  }}</li> -->
@stop

@section('page-header')
<div class="row">
    <div class="col-xs-3">
        <img src="/images/comcast-business-class-logo.gif" width="400px" />
    </div>
    <div class="col-xs-8">
        <h1 style="position: absolute; margin: auto 0; height: 150px; line-height: 125px;">
            Service Proposal: {{ $proposal->customer }}
        </h1>
    </div>
</div>
@stop

@section('sidebar')

@stop

@section('content')
    <div class="block-flat">
        <div class="content" style="margin-top:-20px">
            <div class="row">
                <div class="col-xs-4">
                    <div class="form-group">
                        <label for="customer">Customer Name</label><br />
                        {{ $proposal->customer }}
                    </div>
                </div>
                <div class="col-xs-4">
                    <!-- <button class="btn btn-success pull-right"><i class="fa fa-print"></i> Print</button> -->
                </div>
            </div>
            <div class="form-group">
                <label for="product_package_id">Product Packages</label><br />
                {{ $proposal->productPackage->name }}
            </div>

            <div class="form-group">
                <label for="agreement_length_id">Agreement Length</label><br />
                {{ $proposal->agreementLength->name }}
            </div>
                
            <h3>Internet</h3>
            <div class="row">
                <div class="col-xs-4" style="border-top: 1px solid #000">
                    <div class="form-group">
                        <label for="internet_product_id">Service Speed</label><br />
                		{{ $proposal->internetProduct->name }}
                    </div>
                </div>
                <div class="col-xs-2 text-center" style="border-top: 1px solid #000">
                    <div class="form-group">
                        <label for="internet_product_price">Cost</label><br />
                		{{ $proposal->internet_product_price }}
                    </div>
                </div>
                <div class="col-xs-2 text-center" style="border-top: 1px solid #000">
                    <div class="form-group">
                        <label for="internet_product_cost">Extended</label><br />
                		{{ $proposal->internet_product_price_extended }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <div class="form-group">
                        <label for="static_ip_product_id">Static IP Address(es)</label><br />
                		{{ $proposal->staticIpProduct->name }}
                    </div>
                </div>
                <div class="col-xs-2 text-center">
                    <div class="form-group">
                        <label for="static_ip_product_price">Cost</label><br />
                		{{ $proposal->static_ip_product_price }}
                    </div>
                </div>
                <div class="col-xs-2 text-center">
                    <div class="form-group">
                        <label for="static_ip_product_price_extended">Extended</label><br />
                		{{ $proposal->static_ip_product_price_extended }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <div class="form-group">
                        <label for="">Equipment</label><br />
                        Modem
                    </div>
                </div>
                <div class="col-xs-2 text-center">
                    <div class="form-group">
                        <label for="modem_rental_price">Cost</label><br />
                        {{ $proposal->modem_rental_price }}
                    </div>
                </div>
                <div class="col-xs-2 text-center">
                    <div class="form-group">
                        <label for="modem_rental_price_extended">Extended</label><br />
                        {{ $proposal->modem_rental_price_extended }}
                    </div>
                </div>
            </div>

            <h3>Voice</h3>
            <div class="row">
                <div class="col-xs-4" style="border-top: 1px solid #000">
                    <div class="form-group">
                        <label for="voice_product_id">First 1-3 Lines</label><br />
                        {{ $proposal->voice_lines_under_four_qty }}
                    </div>
                </div>
                <div class="col-xs-2 text-center" style="border-top: 1px solid #000">
                    <div class="form-group">
                        <label for="">Cost</label><br />
                        {{ $proposal->voice_lines_under_four_price }}
                    </div>
                </div>
                <div class="col-xs-2 text-center" style="border-top: 1px solid #000">
                    <div class="form-group">
                        <label for="">Extended</label><br />
                        {{ $proposal->voice_lines_under_four_price_extended }}
                    </div>
                </div>
            </div>
            <div class="row" id="4-plus-row" @if($proposal->voice_lines_over_four_qty == '0') style="display: none" @endif>
                <div class="col-xs-4">
                    <div class="form-group">
                        <label for="agreement_length_id">4+ Lines</label><br />
                        {{ $proposal->voice_lines_over_four_qty }}
                    </div>
                </div>
                <div class="col-xs-2 text-center">
                    <div class="form-group">
                        <label for="voice_lines_over_four_price">Cost</label><br />
                        {{ $proposal->voice_lines_over_four_price }}
                    </div>
                </div>
                <div class="col-xs-2 text-center">
                    <div class="form-group">
                        <label for="voice_lines_over_four_price_extended">Extended</label><br />
                        {{ $proposal->voice_lines_under_four_price_extended }}
                    </div>
                </div>
            </div>
                
            <h3>TV</h3>
            <div class="row">
                <div class="col-xs-4" style="border-top: 1px solid #000">
                    <div class="form-group">
                        <label for="tv_product_price">Channel Package</label><br />
                        {{ $proposal->tvProduct->name }}
                    </div>
                </div>
                <div class="col-xs-2 text-center" style="border-top: 1px solid #000">
                    <div class="form-group">
                        <label for="tv_product_price">Cost</label><br />
                        {{ $proposal->tv_product_price }}
                    </div>
                </div>
                <div class="col-xs-2 text-center" style="border-top: 1px solid #000">
                    <div class="form-group">
                        <label for="tv_product_price_extended">Extended</label><br />
                        {{ $proposal->tv_product_price_extended }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <div class="form-group">
                        <label for="additional_tv_outlets_qty">Additional outlets (after 1<sup>st</sup>)</label><br />
                        {{ $proposal->additional_tv_outlets_qty or '0' }}
                    </div>
                </div>
                <div class="col-xs-2 text-center">
                    <div class="form-group">
                        <label for="additional_tv_outlets_price">Cost</label><br />
                        {{ $proposal->additional_tv_outlets_price or '0.00' }}
                    </div>
                </div>
                <div class="col-xs-2 text-center">
                    <div class="form-group">
                        <label for="additional_tv_outlets_price_extended">Extended</label><br />
                        {{ $proposal->additional_tv_outlets_price_extended or '0.00' }}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-4">
                    <div class="form-group">
                        <label for="additional_hd_outlets_qty">HD Service per Outlet</label><br />
                        {{ $proposal->additional_hd_outlets_qty or '0' }}
                    </div>
                </div>
                <div class="col-xs-2 text-center">
                    <div class="form-group">
                        <label for="additional_hd_outlets_price">Cost</label><br />
                        {{ $proposal->additional_hd_outlets_price or '0.00' }}
                    </div>
                </div>
                <div class="col-xs-2 text-center">
                    <div class="form-group">
                        <label for="additional_hd_outlets_price_extended">Extended</label><br />
                        {{ $proposal->additional_hd_outlets_price_extended or '0.00' }}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-offset-4 col-xs-2 text-center total">
                    <h4 class="bg-warning"><strong>Total Monthly</strong></h4>
                </div>
                <div class="col-xs-2 text-center total">
                    <h4>{{ $proposal->total_monthly_charges }}</h4>
                </div>
            </div>

            <h3>1 time fees</h3>
            <div class="row">
                <div class="col-xs-4">
                    <label for="standard_installation_fee">Standard Installation</label><br />
                    <div class="form-group">
                        <h4 id="product-package-label">{{ $proposal->productPackage->name }} @ {{ $proposal->agreementLength->name }}</h4>
                    </div>
                </div>
                <div class="col-xs-2 text-center">
                    <div class="form-group">
                        <label for="standard_installation_fee_price">Cost</label><br />
                        {{ $proposal->standard_installation_fee_price }}
                    </div>
                </div>
                <div class="col-xs-2 text-center">
                    <div class="form-group">
                        <label for="standard_installation_price_extended">Extended</label><br />
                        {{ $proposal->standard_installation_fee_price_extended }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <div class="form-group">
                        <label for="phone_activation_qty">Phone Activation(s)</label><br />
                        {{ $proposal->phone_activation_qty }}
                    </div>
                </div>
                <div class="col-xs-2 text-center">
                    <div class="form-group">
                        <label for="standard_installation_fee_price">Cost</label><br />
                        {{ $proposal->phone_activation_price }}
                    </div>
                </div>
                <div class="col-xs-2 text-center">
                    <div class="form-group">
                        <label for="standard_installation_price_extended">Extended</label><br />
                        {{ $proposal->phone_activation_price_extended }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-offset-4 col-xs-2 text-center total">
                    <h4 class="bg-warning"><strong>Total 1-Time Costs</strong></h4>
                </div>
                <div class="col-xs-2 text-center total">
                    <h4>{{ $proposal->total_one_time_charges }}</h4>
                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')

<script type="text/javascript">
    $(document).ready(function() {
       
    });
</script>

@stop
