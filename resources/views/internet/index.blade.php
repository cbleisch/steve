@extends('layouts.masterLayout')

@section('styles')
<style type="text/css">

    form.form-inline {
        display: inline;
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
<li class="active">Internet Products</li>
@stop

@section('page-header')
    <a class="pull-right btn btn-success" href="{{ URL::route('internet.create.get') }}">Add Internet Product</a>
<h3>
    Internet Products
</h3>
@stop

@section('sidebar')

@stop

@section('content')
	<div class="block-flat">
		<div class="content" style="margin-top:-20px">
            <table class="table table-responsive table-bordered table-primary">
                <thead>
                    <tr>
                        <th><strong>Name</strong></th>
                        @foreach($packages as $package)
                            <th class="text-right"><strong>{{ $package->name }} Price</strong></th>
                        @endforeach
                        <th></th>
                    </tr>
                </thead>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        @foreach($packages as $package)
                            <td class="text-right">
                                @forelse($product->packages as $pPackage)
                                    {{ $package->id == $pPackage->id ? $pPackage->pivot->price : '' }}
                                @empty
                                    <span class="text-warning">Not available</span>
                                @endforelse
                            </td>
                        @endforeach
                        <td class="text-center" style="width: 15%">
                            <a href="{{ URL::route('internet.create.get', [$product->id]) }}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                            <form action="{{ URL::route('internet.destroy.post', [$product->id]) }}" method="POST" class="form-inline">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <a class="btn btn-danger destroy"><i class="fa fa-trash"></i></a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
		</div>
	</div>
@stop

@section('javascript')
<script type="text/javascript">
    $(document).ready(function() {
        $('.destroy').click(function(e) {
            e.preventDefault();
            if(confirm('Remove this product?')) {
                $(e.target).closest('form').submit();
            }
        });
    });
</script>
@stop
