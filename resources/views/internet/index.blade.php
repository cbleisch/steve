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
<div class="row">
	<div class="col-md-12">
		<div class="block-flat">
			<div class="content" style="margin-top:-20px">
                <table class="table table-responsive table-bordered table-primary">
                    <thead>
                        <tr>
                            <th><strong>Name</strong></th>
                            <th class="text-right"><strong>Single Play Price</strong></th>
                            <th class="text-right"><strong>Double Play Price</strong></th>
                            <th class="text-right"><strong>Triple Play Price</strong></th>
                            <th></th>
                        </tr>
                    </thead>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td class="text-right">${{ $product->spp }}</td>
                            <td class="text-right">${{ $product->dpp }}</td>
                            <td class="text-right">${{ $product->tpp }}</td>
                            <td class="text-right" style="width: 15%">
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
