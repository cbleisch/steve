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
<li class="active">Proposals</li>
@stop

@section('page-header')
    <a class="pull-right btn btn-success" href="{{ URL::route('proposal.create.get') }}">Add Proposal</a>
<h3>
    Proposals
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
                        <th><strong>Customer Name</strong></th>
                        <th></th>
                    </tr>
                </thead>
                @foreach($proposals as $proposal)
                    <tr>
                        <td>{{ $proposal->customer }}</td>
                        
                        <td class="text-center" style="width: 15%">
                            <a href="{{ URL::route('internet.create.get', [$proposal->id]) }}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                            <form action="{{ URL::route('internet.destroy.post', [$proposal->id]) }}" method="POST" class="form-inline">
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
            if(confirm('Remove this proposal?')) {
                $(e.target).closest('form').submit();
            }
        });
    });
</script>
@stop
