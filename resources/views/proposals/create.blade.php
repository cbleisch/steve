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
</style>
@stop

@section('breadcrumbs')
<li><a href="{{ URL::route('proposal.index.get') }}">Proposal Products</a></li>
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
<div class="row">
	<div class="col-md-12">
		<div class="block-flat">
			<div class="content" style="margin-top:-20px">
                <form action="{{ URL::route('proposal.store', [$proposal->id]) }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="name">Customer Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Customer Name" value="{{ $proposal->customer or '' }}" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="packages[]">Product Packages</label><br />
                        <select class="select2" style="width: 100%" name="package_id" id="package-id">
                            @foreach($packages as $package)
                                <option value="{{ $package->id }}">{{ $package->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="agreement_length_id">Agreement Length</label><br />
                        <select class="select2" name="agreement_length_id" id="agreement-length-id">
                        </select>
                    </div>
                    
                    <h3>Internet</h3>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="internet_product_id">Service Speed</label><br />
                                <select class="select2" name="internet_product_id" id="internet-product-id">
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="">Cost</label><br />
                                <input class="form-control" name="internet_product_cost" id="internet-product-price" readonly="" />
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="">Extended</label><br />
                                <input class="form-control" name="internet_product_cost" id="internet-product-price-extended" readonly="" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="static_ip_product_id">Static IP Address(es)</label><br />
                                <select class="select2" name="static_ip_product_id" id="static-ip-product-id">
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="">Cost</label><br />
                                <input class="form-control" name="static_ip_product_price" id="static-ip-product-price" readonly="" />
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="">Extended</label><br />
                                <input class="form-control" name="static_ip_product_price_extended" id="static-ip-product-price-extended" readonly="" />
                            </div>
                        </div>
                    </div>
                    <h3>Voice</h3>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="voice_product_id">First 1-3 Lines</label><br />
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-hashtag"></i></span>
                                    <input type="number" class="form-control" name="voice_lines_under_four_qty" max="3" step="1" min="0" value="{{ $proposal->voice_lines_under_four_qty ? $proposal->voice_lines_under_four_qty : 0 }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="">Cost</label><br />
                                <input class="form-control" name="voice_lines_under_four_price" id="voice-lines-under-four-price" readonly="" />
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="">Extended</label><br />
                                <input class="form-control" name="voice_lines_under_four_price_extended" id="voice-lines-under-four-price-extended" readonly="" />
                            </div>
                        </div>
                    </div>
                    <div class="row" id="4-plus-row" style="display: none">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="agreement_length_id">4+ Lines</label><br />
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-hashtag"></i></span>
                                    <input type="number" class="form-control" name="voice_lines_over_four_qty" step="1" min="0" value="{{ $proposal->voice_lines_over_four_qty ? $proposal->voice_lines_over_four_qty : 0 }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="">Cost</label><br />
                                <input class="form-control" name="voice_lines_over_four_price" id="voice-lines-over-four-price" readonly="" />
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="">Extended</label><br />
                                <input class="form-control" name="voice_lines_over_four_price_extended" id="voice-lines-over-four-price-extended" readonly="" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <h3>TV</h3>
                            <div class="form-group">
                                <select class="select2" id="tv-product-id">
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <h3>NUMBERS</h3>
                            
                        </div>
                    </div>
                    <p style="margin-top: 40px; margin-left: -5px">
                    <a class="btn btn-default" href="{{ URL::previous() }}">Cancel</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </p>
                </form>
			</div>
		</div>
	</div>
</div>
@stop

@section('javascript')

<script type="text/javascript">
    $(document).ready(function() {
        packageSelects();


        $('.length-select, .internet-select').select2()
        $packageSelect = $("#package-id");
        $internetProductSelect = $('#internet-product-id');
        
        $packageSelect.on("change", function (e) {
            packageSelects();
        });

        $internetProductSelect.on("change", function (e) {
            var productID = $('#internet-product-id').val();
            var packageID = $('#package-id').val();
            $.get('/internetProducts/'+productID+'/'+packageID+'/getPrice', function(data) {
                $('#internet-product-price, #internet-product-price-extended').val(data);
                // $('').val(data);
            });
        });

        $('[name="voice_lines_under_four_qty"]').on('change', function(e) {
            var qty = e.target.value;
            var price = $('#voice-lines-under-four-price').val();
            $('[name="voice_lines_under_four_price_extended"]').val(price * qty);
            if(qty >= 3) {
                $('#4-plus-row').show();
            } else {
                $('#4-plus-row').hide();
            }
        });

        $('[name="voice_lines_over_four_qty"]').on('change', function(e) {
            var qty = e.target.value;
            var price = $('#voice-lines-over-four-price').val();
            $('[name="voice_lines_over_four_price_extended"]').val(price * qty);
        });

        function packageSelects() {
            var packageID = $('#package-id').val();
            $.get('/packages/'+packageID+'/getSelects', function(data) {
                // console.log(data.internetSelect);
                $('#agreement-length-id').select2('destroy').html('');
                $('#agreement-length-id').select2({
                    data: data.agreementLengthsSelect
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
                $('#internet-product-id').trigger('change');
            });
        }
    });
</script>

@stop
