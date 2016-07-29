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
<li><a href="{{ URL::route('tv.index.get') }}">TV Products</a></li>
<li class="active">{{ $product->id ? 'Modify' : 'Create'  }}</li>
@stop

@section('page-header')
<h3>
    {{ $product->id ? 'Modify' : 'Create'  }} TV Product
</h3>
@stop

@section('sidebar')

@stop

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="block-flat">
			<div class="content" style="margin-top:-20px">
                <form action="{{ URL::route('tv.store', [$product->id]) }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Product Name" value="{{ $product->name or '' }}" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="spp">Single Play Price</label>
                        <input type="number" class="form-control" id="spp" name="spp" placeholder="0.00" value="{{ $product->spp or '' }}" required step=".01">
                    </div>

                    <div class="form-group">
                        <label for="dpp">Double Play Price</label>
                        <input type="number" class="form-control" id="dpp" name="dpp" placeholder="0.00" value="{{ $product->dpp or '' }}" required step=".01">
                    </div>

                    <div class="form-group">
                        <label for="tpp">Tripple Play Price</label>
                        <input type="number" class="form-control" id="tpp" name="tpp" placeholder="0.00" value="{{ $product->tpp or '' }}" required step=".01">
                    </div>
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

	

</script>

@stop
