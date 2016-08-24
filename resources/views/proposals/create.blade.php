@extends('layouts.masterLayout')

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

    .input-group-addon {
        background-color: #337ab7;
        border: 1px solid #2d6ca2;
    }
    .input-group-addon > i {
        color: #fff;
    }

    .ui-datepicker {
        background-color: #fff;
    }

    .ui-datepicker .ui-datepicker-header {
        background: #337ab7;
        color: #fff;
    }

    .ui-datepicker > table {
        background-color: rgba(51, 122, 183, 0.35);
    }

    .ui-datepicker table th span, .ui-datepicker td span, .ui-datepicker td a {
        color: #000;
    }

    .ui-datepicker td a:hover {
        background: #337ab7;
    }
</style>
@stop

@section('breadcrumbs')
<li><a href="{{ URL::route('proposal.index.get') }}">Proposal</a></li>
<li class="active">{{ $proposal->id ? 'Modify' : 'Create'  }}</li>
@stop

@section('page-header')
<h3>
    {{ $proposal->id ? 'Modify' : 'Create'  }} Proposal: {{ $proposal->customer }}
</h3>
@stop

@section('sidebar')

@stop

@section('content')
<div class="block-flat">
            <div class="content" style="margin-top:-20px">
                <form action="{{ URL::route('proposal.store', [$proposal->id]) }}" method="POST" id="proposal-form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="date">Proposal Date</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="string" class="form-control" id="date" name="date" value="" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="customer">Customer Name</label>
                                <input type="text" class="form-control" id="customer" name="customer" placeholder="Customer Name" value="{{ $proposal->customer or '' }}" required autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="product_package_id">Product Packages</label>
                                <select class="select2" style="width: 100%" name="product_package_id" id="product-package-id">
                                    @foreach($packages as $package)
                                        <option value="{{ $package->id }}" {{ $package->id == $proposal->product_package_id ? 'selected' : '' }}>{{ $package->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="agreement_length_id">Agreement Length</label>
                                <select class="select2" name="agreement_length_id" id="agreement-length-id">
                                </select>
                            </div>
                        </div>
                    </div>
                    <h3>Internet</h3>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="internet_product_id">Service Speed</label>
                                <select class="select2" name="internet_product_id" id="internet-product-id">
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2 text-center">
                            <div class="form-group">
                                <label for="internet_product_price">Cost</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                    <input type="number" class="form-control text-right" name="internet_product_price" id="internet-product-price" readonly="" step=".01" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 text-center">
                            <div class="form-group">
                                <label for="internet_product_cost">Extended</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                    <input type="number" class="form-control add-to-monthly-charges text-right" name="internet_product_price_extended" id="internet-product-price-extended" step=".01" readonly="" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-12" style="position: fixed; float: right; right: 0px; z-index: 1000;">
                            <div class="panel panel-primary">
                                <div class="panel-heading text-center">
                                    <h4><span style="color: #fff">TOTALS</span></h4>
                                </div>
                                <div class="panel-body text-center">
                                    <dl class="dl-horizontal">
                                        <dt>
                                            <div class="form-group">
                                                <h4><strong>Total Monthly</strong></h4>
                                            </div>
                                        </dt>
                                        <dd>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                                    <input type="number" class="form-control text-right" name="total_monthly_charges" id="total-monthly-charges" step=".01" readonly="" />
                                                </div>
                                            </div>
                                        </dd>
                                        <dt>
                                            <div class="form-group">
                                                <h4><strong>Total 1-time Costs</strong></h4>
                                            </div>
                                        </dt>
                                        <dd>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                                    <input type="number" class="form-control text-right" name="total_one_time_charges" id="total-one-time-charges" step=".01" readonly="" />
                                                </div>
                                            </div>
                                        </dd>
                                    </dl>
                                    <a class="btn btn-default" href="{{ URL::previous() }}">Cancel</a>
                                    @if($proposal->id)
                                        <a class="btn btn-success" id="print-button"><i class="fa fa-print"></i> Print View</a>
                                    @endif
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="static_ip_product_id">Static IP Address(es)</label>
                                <select class="select2" name="static_ip_product_id" id="static-ip-product-id">
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2 text-center">
                            <div class="form-group">
                                <label for="static_ip_product_price">Cost</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                    <input type="number" class="form-control text-right" name="static_ip_product_price" id="static-ip-product-price" step=".01" readonly="" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 text-center">
                            <div class="form-group">
                                <label for="static_ip_product_price_extended">Extended</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                    <input type="number" class="form-control add-to-monthly-charges text-right" name="static_ip_product_price_extended" id="static-ip-product-price-extended" step=".01" readonly="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="">Equipment</label><br />
                                Modem
                            </div>
                        </div>
                        <div class="col-sm-2 text-center">
                            <div class="form-group">
                                <label for="modem_rental_price">Cost</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                    <input type="number" class="form-control text-right" name="modem_rental_price" id="modem-rental-price" step=".01" readonly="" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 text-center">
                            <div class="form-group">
                                <label for="modem_rental_price_extended">Extended</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                    <input type="number" class="form-control add-to-monthly-charges text-right" name="modem_rental_price_extended" id="modem-rental-price-extended" step=".01" readonly="" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3>Voice</h3>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="voice_product_id">First 1-3 Lines</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-hashtag"></i></span>
                                    <input type="number" class="form-control" name="voice_lines_under_four_qty" id="voice-lines-under-four-qty" max="3" step="1" min="0" value="{{ $proposal->voice_lines_under_four_qty ? $proposal->voice_lines_under_four_qty : 0 }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 text-center">
                            <div class="form-group">
                                <label for="">Cost</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                    <input type="number" class="form-control text-right" name="voice_lines_under_four_price" id="voice-lines-under-four-price" readonly="" step=".01" value="{{ $proposal->voice_lines_under_four_price or '0.00' }}" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 text-center">
                            <div class="form-group">
                                <label for="">Extended</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                    <input type="number" class="form-control add-to-monthly-charges text-right" name="voice_lines_under_four_price_extended" id="voice-lines-under-four-price-extended" readonly="" step=".01" value="{{ $proposal->voice_lines_under_four_price_extended or '0.00' }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="4-plus-row" @if($proposal->voice_lines_under_four_qty < 3) style="display: none" @endif>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="agreement_length_id">4+ Lines</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-hashtag"></i></span>
                                    <input type="number" class="form-control" name="voice_lines_over_four_qty" id="voice-lines-over-four-qty" step="1" min="0" value="{{ $proposal->voice_lines_over_four_qty ? $proposal->voice_lines_over_four_qty : 0 }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 text-center">
                            <div class="form-group">
                                <label for="voice_lines_over_four_price">Cost</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                    <input type="number" class="form-control text-right" name="voice_lines_over_four_price" id="voice-lines-over-four-price" step=".01" readonly="" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 text-center">
                            <div class="form-group">
                                <label for="voice_lines_over_four_price_extended">Extended</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                    <input type="number" class="form-control add-to-monthly-charges text-right" name="voice_lines_over_four_price_extended" id="voice-lines-over-four-price-extended" step=".01" readonly="" value="{{ $proposal->voice_lines_over_four_price_extended or '0.00' }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <h3>TV</h3>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="tv_product_price">Channel Package</label>
                                <select class="select2" name="tv_product_id" id="tv-product-id">
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2 text-center">
                            <div class="form-group">
                                <label for="tv_product_price">Cost</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                    <input type="number" class="form-control text-right" name="tv_product_price" id="tv-product-price" step=".01" readonly="" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 text-center">
                            <div class="form-group">
                                <label for="tv_product_price_extended">Extended</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                    <input type="number" class="form-control add-to-monthly-charges text-right" name="tv_product_price_extended" id="tv-product-price-extended" step=".01" readonly="" />
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="additional_tv_outlets_qty">Additional outlets (after 1<sup>st</sup>)</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-hashtag"></i></span>
                                    <input type="number" class="form-control" name="additional_tv_outlets_qty" id="additional-tv-outlets-qty" step="1" min="0" value="{{ $proposal->additional_tv_outlets_qty ? $proposal->additional_tv_outlets_qty : 0 }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 text-center">
                            <div class="form-group">
                                <label for="additional_tv_outlets_price">Cost</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                    <input type="number" class="form-control text-right" name="additional_tv_outlets_price" id="additional-tv-outlets-price" readonly="" step=".01" value="{{ $proposal->additional_tv_outlets_price or '0.00' }}" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 text-center">
                            <div class="form-group">
                                <label for="additional_tv_outlets_price_extended">Extended</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                    <input type="number" class="form-control add-to-monthly-charges text-right" name="additional_tv_outlets_price_extended" id="additional-tv-outlets-price-extended" readonly="" step=".01" value="{{ $proposal->additional_tv_outlets_price_extended or '0.00' }}" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="additional_hd_outlets_qty">HD Service per Outlet</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-hashtag"></i></span>
                                    <input type="number" class="form-control" name="additional_hd_outlets_qty" id="additional-hd-outlets-qty" max="{{ $proposal->additional_tv_outlets_qty + 1 }}" step="1" min="0" value="{{ $proposal->additional_hd_outlets_qty ? $proposal->additional_hd_outlets_qty : 0 }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 text-center">
                            <div class="form-group">
                                <label for="additional_hd_outlets_price">Cost</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                    <input type="number" class="form-control text-right" name="additional_hd_outlets_price" id="additional-hd-outlets-price" readonly="" step=".01" value="{{ $proposal->additional_hd_outlets_price or '0.00' }}" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 text-center">
                            <div class="form-group">
                                <label for="additional_hd_outlets_price_extended">Extended</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                    <input type="number" class="form-control add-to-monthly-charges text-right" name="additional_hd_outlets_price_extended" id="additional-hd-outlets-price-extended" readonly="" step=".01" value="{{ $proposal->additional_hd_outlets_price_extended or '0.00' }}" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3>1 time fees</h3>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="standard_installation_fee">Standard Installation</label><br />
                            <div class="form-group">
                                <h4 id="product-package-label" class="label label-primary">Test</h4>
                                <h4 id="agreement-length-label" class="label label-success">Test</h4>
                            </div>
                        </div>
                        <div class="col-sm-2 text-center">
                            <div class="form-group">
                                <label for="standard_installation_fee_price">Cost</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                    <input type="number" class="form-control text-right" name="standard_installation_fee_price" id="standard-installation-fee-price" readonly="" step=".01" value="{{ $proposal->standard_installation_free_price or '0.00' }}" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 text-center">
                            <div class="form-group">
                                <label for="standard_installation_price_extended">Extended</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                    <input type="number" class="form-control add-to-one-time-charges text-right" name="standard_installation_fee_price_extended" id="standard-installation-fee-price-extended" readonly="" step=".01" value="{{ $proposal->standard_installation_fee_price_extended or '0.00' }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="phone_activation_qty">Phone Activation(s)</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-hashtag"></i></span>
                                    <input type="number" class="form-control" name="phone_activation_qty" id="phone-activation-qty" value="{{ $proposal->phone_activation_qty or '0' }}" min="0" max="4" step="1" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 text-center">
                            <div class="form-group">
                                <label for="standard_installation_fee_price">Cost</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                    <input type="number" class="form-control text-right" name="phone_activation_price" id="phone-activation-price" readonly="" step=".01" value="{{ $proposal->phone_activation_price or '0.00' }}" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 text-center">
                            <div class="form-group">
                                <label for="standard_installation_price_extended">Extended</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                    <input type="number" class="form-control add-to-one-time-charges text-right" name="phone_activation_price_extended" id="phone-activation-price-extended" readonly="" step=".01" value="{{ $proposal->phone_activation_price_extended or '0.00' }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@stop

@section('javascript')

<script type="text/javascript">
    $(document).ready(function() {
        $('#print-button').on('click', function(e) {
            e.preventDefault();
            var route = "{{ URL::route('proposal.store', [$proposal->id, 'print']) }}";
            var form = $('#proposal-form');
            $(form).attr('action', route);
            $(form).attr('target', '_blank');
            $(form).submit();
        });

        $('#date').daterangepicker({
            singleDatePicker: true,
            locale: {
                format: 'MM/DD/YYYY'
            }
        }).val("{{ Carbon\Carbon::parse($proposal->proposalDates->sortByDesc('created_at')->first()->date)->format('m/d/Y') }}");

        var originalData = [];
        originalData['internet_product_id'] = {{ $proposal->internet_product_id or 0 }};
        originalData['agreement_length_id'] = '{{ $proposal->agreement_length_id or 0 }}';
        originalData['static_ip_product_id'] = '{{ $proposal->static_ip_product_id or 0 }}';
        originalData['tv_product_id'] = '{{ $proposal->tv_product_id or 0 }}';
        
        var firstLoad = true;
        packageSelects(firstLoad);
        
        function calcTotalMothlyCharges() {
            var sum = 0;
            $('.add-to-monthly-charges').each(function() {
                if(!isNaN($(this).val()) && $(this).val() != '') {
                    sum += parseFloat($(this).val());
                }
            });
            $('#total-monthly-charges').val(parseFloat(sum).toFixed(2));
        }

        function calcOneTimeCharges() {
            var sum = 0;
            $('.add-to-one-time-charges').each(function() {
                if(!isNaN($(this).val()) && $(this).val() != '') {
                    sum += parseFloat($(this).val());
                }
            });
            $('#total-one-time-charges').val(sum);
        }

        $('.add-to-monthly-charges').on('change', function() {
            calcTotalMothlyCharges();
        });

        $('.add-to-one-time-charges').on('change', function() {
            calcOneTimeCharges();
        });



        $('.length-select, .internet-select').select2();
        $packageSelect = $("#product-package-id");
        $internetProductSelect = $('#internet-product-id');
        $staticIpProductSelect = $('#static-ip-product-id');
        $tvProductSelect = $('#tv-product-id');
        $agreementLengthSelect = $('#agreement-length-id');
        
        $packageSelect.on("change", function (e) {
            packageSelects(false);
        });

        $internetProductSelect.on("change", function (e) {
            var productID = $('#internet-product-id').val();
            var packageID = $('#product-package-id').val();
            $.get('/internetProducts/'+productID+'/'+packageID+'/getPrice/', function(data) {
                $('#internet-product-price, #internet-product-price-extended').val(data.productPrice).trigger('change');
                $('#modem-rental-price, #modem-rental-price-extended').val(data.modemRentalPrice).trigger('change');
            });
        });

        $staticIpProductSelect.on("change", function (e) {
            var productID = $('#static-ip-product-id').val();
            var packageID = $('#product-package-id').val();
            $.get('/ipProducts/'+productID+'/'+packageID+'/getPrice', function(data) {
                $('#static-ip-product-price, #static-ip-product-price-extended').val(data).trigger('change');
            });
        });

        $tvProductSelect.on("change", function (e) {
            var productID = $('#tv-product-id').val();
            var packageID = $('#product-package-id').val();
            $.get('/ipProducts/'+productID+'/'+packageID+'/getPrice', function(data) {
                $('#tv-product-price, #tv-product-price-extended').val(data).trigger('change');
            });
        });

        $agreementLengthSelect.on("change", function (e) {
            var agreementLengthID = $('#agreement-length-id').val();
            var packageID = $('#product-package-id').val();
            $.get('/agreementLengths/'+agreementLengthID+'/'+packageID+'/getPrice', function(data) {
                $('#standard-installation-fee-price, #standard-installation-fee-price-extended').val(data).trigger('change');
            });

            // $('#agreement-length-label').text($(this).text());

            var test = $('#agreement-length-id');
            // var theSelection = $(test).select2('data').text;
            // $('#agreement-length-label').text(theSelection);
        });

        $('[name="voice_lines_under_four_qty"]').on('change', function(e) {
            var qty = e.target.value;
            var price = $('#voice-lines-under-four-price').val();
            $('#voice-lines-under-four-price-extended').val(parseFloat(price * qty).toFixed(2)).trigger('change');
            if(qty >= 3) {
                $('#4-plus-row').show();
            } else {
                $('#voice-lines-over-four-qty').val('0').trigger('change');
                $('#4-plus-row').hide();
            }
            $('#phone-activation-qty').val(qty).trigger('change');
            
        });

        $('[name="voice_lines_over_four_qty"]').on('change', function(e) {
            var qty = e.target.value;
            var price = $('#voice-lines-over-four-price').val();
            $('#voice-lines-over-four-price-extended').val(parseFloat(price * qty).toFixed(2)).trigger('change');
            
            var max = parseInt($('#phone-activation-qty').attr('max'));
            $('#phone-activation-qty').val(max).trigger('change');
        });

        $('[name="phone_activation_qty"]').on('change', function(e) {
            var qty = e.target.value;
            var price = $('#phone-activation-price').val();
            $('#phone-activation-price-extended').val(parseFloat(price * qty).toFixed(2)).trigger('change');
        });

        $('[name="additional_tv_outlets_qty"]').on('change', function(e) {
            var qty = e.target.value;
            var price = $('#additional-tv-outlets-price').val();
            var maxHD = ++qty;
            console.log(maxHD);
            $('#additional-tv-outlets-price-extended').val(parseFloat(price * qty).toFixed(2)).trigger('change');
            $('#additional-hd-outlets-qty').attr('max', maxHD);
        });

        $('#additional-hd-outlets-qty').on('change', function(e) {
            var qty = e.target.value;
            var price = $('#additional-hd-outlets-price').val();
            $('#additional-hd-outlets-price-extended').val(parseFloat(price * qty).toFixed(2)).trigger('change');
        });

        function packageSelects(firstLoad) {
            var packageID = $('#product-package-id').val();

            $.get('/packages/'+packageID+'/getSelects', function(data) {
                
                $('#agreement-length-id').select2('destroy').html('');
                $('#agreement-length-id').select2({
                    data: data.agreementLengthsSelect,
                });

                $('#internet-product-id').select2('destroy').html('');
                $('#internet-product-id').select2({
                    data: data.internetSelect
                });

                $('#tv-product-id').select2('destroy').html('');
                $('#tv-product-id').select2({
                    data: data.tvSelect
                });

                $('#static-ip-product-id').select2('destroy').html('');
                $('#static-ip-product-id').select2({
                    data: data.ipSelect
                });
                
                $('#voice-lines-under-four-price').val(data.package.voice_lines_under_four_price);
                $('#voice-lines-over-four-price').val(data.package.voice_lines_over_four_price);
                $('#additional-tv-outlets-price').val(data.package.additional_tv_outlet_price);
                $('#additional-hd-outlets-price').val(data.package.hd_tv_per_outlet_price);


                $('#phone-activation-price').val(data.package.phone_activation_fee);
                
                
                var test = $('#product-package-id');
                var theSelection = $(test).select2('data').text;
                $('#product-package-label').text(theSelection);

                if(firstLoad) {
                    $('#agreement-length-id').val(originalData.agreement_length_id);
                    $('#internet-product-id').val(originalData.internet_product_id);
                    $('#static-ip-product-id').val(originalData.static_ip_product_id);
                    $('#tv-product-id').val(originalData.tv_product_id);
                    // console.log(originalData);
                    firstLoad = false;
                }

                $('#agreement-length-id').trigger('change');
                $('#internet-product-id').trigger('change');
                $('#static-ip-product-id').trigger('change');
                $('#tv-product-id').trigger('change');
                
            });
        }
    });
</script>

@stop
