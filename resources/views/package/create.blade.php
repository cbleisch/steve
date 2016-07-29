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
<li><a href="{{ URL::route('package.index.get') }}">Product Packages</a></li>
<li class="active">{{ $package->id ? 'Modify' : 'Create'  }}</li>
@stop

@section('page-header')
<h3>
    {{ $package->id ? 'Modify' : 'Create'  }} Product Package
</h3>
@stop

@section('sidebar')

@stop

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="block-flat">
			<div class="content" style="margin-top:-20px">
                <form action="{{ URL::route('package.store', [$package->id]) }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Package Name" value="{{ $package->name or '' }}" required autofocus>
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
