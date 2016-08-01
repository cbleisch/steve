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
</style>
@stop

@section('breadcrumbs')
<li><a href="{{ URL::route('voice.index.get') }}">Voice Products</a></li>
<li class="active">{{ $product->id ? 'Modify' : 'Create'  }}</li>
@stop

@section('page-header')
<h3>
    {{ $product->id ? 'Modify' : 'Create'  }} Voice Product: {{ $product->name }}
</h3>
@stop

@section('sidebar')

@stop

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="block-flat">
			<div class="content" style="margin-top:-20px">
                <form action="{{ URL::route('voice.store', [$product->id]) }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Product Name" value="{{ $product->name or '' }}" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="tpp">Product Packages</label><br />
                        <select class="select2" multiple style="width: 100%" name="packages[]" id="packages[]">
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
                       <div class="form-group {{ strtolower(str_replace(' ', '-', 'package-'.$package->id)) }} package-price" data-id="{{$package->id}}" style="display: none">
                        <label for="">{{ $package->name }} Price</label>
                        <input type="number" class="form-control" id="packagePrice[{{ $package->id }}]" name="packagePrice[{{ $package->id }}]" placeholder="0.00"
                            value="@foreach($product->packages as $pPackage){{ $pPackage->id == $package->id  ? $pPackage->pivot->price : ''}}@endforeach"
                            required step=".01"
                        >
                        </div> 
                    @endforeach
                    <a class="btn btn-default" href="{{ URL::previous() }}">Cancel</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
			</div>
		</div>
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
            selectValues = $('[name="packages[]"]').val();
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
