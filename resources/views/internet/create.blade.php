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
    .s2-event-log, .s2-event-log  li {
    background: #002451;
    color: #fff !important;
    font-family: Menlo, 'Bitstream Vera Sans Mono', 'DejaVu Sans Mono', Monaco, Consolas, monospace;
    margin: 0 -15px 15px;
    padding: 45px 15px 15px;
    position: relative;
}
</style>
@stop

@section('breadcrumbs')
<li><a href="{{ URL::route('internet.index.get') }}">Internet Products</a></li>
<li class="active">{{ $product->id ? 'Modify' : 'Create'  }}</li>
@stop

@section('page-header')
<h3>
    {{ $product->id ? 'Modify' : 'Create'  }} Internet Product: {{ $product->name }}
</h3>
@stop

@section('sidebar')

@stop

@section('content')
    <div class="block-flat">
			<div class="content" style="margin-top:-20px">
                <form action="{{ URL::route('internet.store', [$product->id]) }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Product Name" value="{{ $product->name or '' }}" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="tpp">Product Packages</label><br />
                        <select class="select2" multiple style="width: 100%" name="packages[]" id="packages">
                            @foreach($packages as $package)
                                <option value="{{ $package->id }}"
                                    @foreach($product->packages as $aPackage)
                                        {{ $aPackage->id == $package->id  ? 'selected' : ''}}
                                    @endforeach
                                >{{ $package->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @foreach($packages as $package)
                       <div class="form-group package-price" data-id="{{$package->id}}" style="display: none">
                            <label for="">{{ $package->name }} Price</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                <input type="number" class="form-control" id="packagePrice[{{ $package->id }}]" name="packagePrice[{{ $package->id }}]" placeholder="0.00"
                                value="@foreach($product->packages as $pPackage){{ $pPackage->id == $package->id  ? $pPackage->pivot->price : ''}}@endforeach"
                                step=".01"
                                >
                            </div>
                        </div> 
                    @endforeach
                    <div class="form-group">
                        <label for="modem_rental_price">Modem Rental Price</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                            <input type="number" class="form-control" name="modem_rental_price" id="modem-rental-price" min="0" step=".01" placeholder="0.00" value="{{ $product->modem_rental_price or '' }}" />
                        </div>
                    </div>
                    <a class="btn btn-default" href="{{ URL::previous() }}">Cancel</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
			</div>
	</div>
@stop

@section('javascript')

<script type="text/javascript">
    $(document).ready(function() {
        showPackages();
        var $eventLog = $(".js-event-log");
        $packageSelect = $(".select2");
        $packageSelect.on("change", function (e) {
            showPackages();
        });

        function showPackages() {
            selectValues = $('#packages').val();
            var divs = $('.package-price');
            $.each(divs, function(target) {
                var id = $(this).attr('data-id');
                // console.log(id);
                if($.inArray(id, selectValues) > -1) {
                    $('[data-id="'+id+'"]').show();
                } else {
                    $('[data-id="'+id+'"]').hide();
                }
            });
        }
    });
</script>

@stop
