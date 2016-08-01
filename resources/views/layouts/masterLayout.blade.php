<!DOCTYPE html>
<html lang="en">
<!--

* © {{ Date('Y') }} {{ env('DEVELOPER') }}
*
* LICENSE
*
* Unless required by applicable law or agreed to in writing, software
* distributed under the License is distributed on an "AS IS" BASIS,
* WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
*
* {{ env('DEVELOPER') }} <{{ env('DEVELOPER_EMAIL') }}>
* © {{ Date('Y') }} {{ env('DEVELOPER') }}
* International Registered Trademark & Property of {{ env('DEVELOPER') }}

-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    

    <title>
    	{{ env('PROJECT_NAME') }}
    	@if (!empty(Request::segment(1)))
    	- {{ ucwords(Request::segment(1)) }}
    	@endif
    </title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,200,100" rel="stylesheet">
    
    <!-- Bootstrap -->
    <link href="{{ asset('/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/bower_components/gritter/css/jquery.gritter.css') }}" rel="stylesheet">

    <!-- FA -->
    <link href="{{ asset('fonts/font-awesome-4/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Theme -->
    <link href="{{ asset('/css/dashboard.css') }}" rel="stylesheet">

    <!-- DataTables -->
    <link href="{{ asset('/js/jquery.datatables-bootstrap/bootstrap-adapter/css/datatables.css') }}" rel="stylesheet">

    <!-- Helper scripts -->
    <script src="{{ asset('/js/holder.js') }}"></script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

    <link href="{{ asset('/bower_components/nanoscroller/bin/css/nanoscroller.css') }}" rel="stylesheet">
    <link href="{{ asset('/bower_components/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css') }}" rel="stylesheet">
    <link href="{{ asset('/bower_components/smalot-bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/bower_components/select2/dist/css/select2.css') }}" rel="stylesheet">
    <link href="{{ asset('/bower_components/bootstrap.multiselect/dist/css/bootstrap-multiselect.css') }}" rel="stylesheet">
    <link href="{{ asset('/bower_components/jquery.multi-select/css/multi-select.css') }}" rel="stylesheet">
    <link href="{{ asset('/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('/bower_components/x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css') }}" rel="stylesheet">
    <link href="{{ asset('/bower_components/jquery-niftymodals/css/component.css') }}" rel="stylesheet">
    <link href="{{ asset('/bower_components/icheck/skins/square/blue.css') }}" rel="stylesheet">
    <link href="{{ asset('/js/validation/formValidation.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/bower_components/bootstrap3-wysiwyg/dist/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">

	<!-- Custom styles for this application -->
    <link href="{{ asset('/css/views/global.css') }}" rel="stylesheet">

	<!-- Include custom CSS, if the file exists -->
    @if (file_exists('css/views/'.(Request::segment(1)?:'index').'/'.(Request::segment(2)?:'index').'.css'))
    <!-- Attempting to find: {{ 'css/views/'.(Request::segment(1)?:'index').'/'.(Request::segment(2)?:'index').'.css' }} -->
    <link href="{{ asset('/css/views/'.(Request::segment(1)?:'index').'/'.(Request::segment(2)?:'index').'.css') }}" rel="stylesheet">
    @elseif (file_exists('css/views/'.Request::segment(1).'.css'))
    <!-- Attempting to find: {{ 'css/views/'.Request::segment(1).'.css' }} -->
    <link href="{{ asset('/css/views/'.Request::segment(1).'.css') }}" rel="stylesheet">
    @endif

    @yield('styles')

</head>

<body>

    <!-- Fixed navbar -->
    <div id="head-nav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="fa fa-gear"></span>
                </button>
                <a class="navbar-brand" href="#"><span>&nbsp;{{env('COMPANY_NAME')}} {{env('PROJECT_NAME')}}</span></a>
            </div>
            <div class="navbar-header">

            </div>
            <div class="navbar-collapse collapse">
                <div class="col-md-3" style="margin-top: 7px;">
                </div>
                @if (Auth::check())
                <ul class="nav navbar-nav navbar-right user-nav">
                    <li class="dropdown profile_menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }} <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('setup.users.modify.get', ['id' => Auth::user()->id]) }}">Account</a></li>
                            <li><a href="{{ route('qb.index.get') }}">QB Sync Instructions</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ url('/auth/logout') }}">Sign Out</a></li>
                        </ul>
                    </li>
                </ul>
                @endif
            </div><!--/.nav-collapse -->
        </div>
    </div>

    {{-- the $__env->yieldContent(...) checks for sidebar to collapse nav menu --}}
    <div class="fixed-menu {{(trim($__env->yieldContent('sidebar')))?'sb-collapsed':''}}" id="cl-wrapper">
        <div class="cl-sidebar">
            <div class="cl-toggle"><i class="fa fa-bars"></i></div>
            <div class="cl-navblock">
                <div class="menu-space">
                    <div class="content nano-content">
                        @include('layouts.partials.menu')
                    </div>
                </div>
                <div class="text-right collapse-button" style="padding:7px 9px;">
                    <button id="sidebar-collapse" class="btn btn-default" style=""><i style="color:#fff;" class="fa fa-angle-{{(trim($__env->yieldContent('sidebar')))?'right':'left'}}"></i></button>
                </div>
            </div>
        </div>
        @yield('sidebar')


        <div class="container-fluid" id="pcont">
            <div class="page-head">
                <div id="messageContainer">
                    @if(Session::has('show-message'))
                    @include('partials.alerts.message')
                    @endif
                    @if(Session::has('show-warning'))
                    @include('partials.alerts.warning')
                    @endif
                </div>
                @include('flash::message')

                <ol class="breadcrumb">
                    <li class="{{ (Request::segment(1))?'':'active' }}">
                        @if (Request::segment(1))
                        <a href="{{ route('dashboard.index.get') }}">Dashboard</a>
                        @else
                        Home
                        @endif
                    </li>

                    @yield('breadcrumbs')
                </ol>
                @yield('page-header')
            </div>
            @yield('content')
        </div>

    </div>

    <!-- Includes for AJAX CRUD -->
    @include('partials.modals.delete_modal')
    @include('partials.modals.edit_crud_modal')
    @include('partials.modals.new_crud_modal')

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('/bower_components/moment/moment.js') }}"></script>
    <!-- Javascript included with theme -->
    <script src="{{ asset('/bower_components/parsleyjs/dist/parsley.min.js') }}"></script>
    <script src="{{ asset('/bower_components/nanoscroller/bin/javascripts/jquery.nanoscroller.js') }}"></script>
    <script src="{{ asset('/bower_components/sparkline/dist/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.js') }}"></script>
    <script src="{{ asset('/js/behaviour/general.js') }}"></script>
    <script src="{{ asset('/bower_components/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('/bower_components/nestable/jquery.nestable.js') }}"></script>
    <script src="{{ asset('/bower_components/bootstrap-switch/dist/js/bootstrap-switch.min.js') }}"></script>
    <script src="{{ asset('/bower_components/smalot-bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('/bower_components/bootstrap-slider/bootstrap-slider.js') }}"></script>
    <script src="{{ asset('/bower_components/gritter/js/jquery.gritter.min.js') }}"></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/js/jquery.datatables-bootstrap/bootstrap-adapter/js/datatables.js') }}"></script>
    <script src="{{ asset('/js/jquery.datatables-bootstrap/jquery.dataTables.columnFilter.js') }}"></script>
    <script src="{{ asset('/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('/bower_components/typeahead.js/dist/typeahead.jquery.js') }}"></script>
    <script src="{{ asset('/bower_components/bootstrap.multiselect/dist/js/bootstrap-multiselect.js') }}"></script>
	<script src="{{ asset('/bower_components/jquery.multi-select/js/jquery.multi-select.js') }}"></script>
    <script src="{{ asset('/bower_components/blockui/jquery.blockUI.js') }}"></script>
    <script src="{{ asset('/bower_components/jquery-niftymodals/js/jquery.modalEffects.js') }}"></script>
    <script src="{{ asset('/bower_components/jquery.maskedinput/dist/jquery.maskedinput.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/bower_components/ajax_crud/dist/js/AjaxCrud.js') }}"></script>

    <script type="text/javascript">
    var urlDataTableUpdateLengthPost = "{{ route('data_table.update_length.post') }}";

    $(document).ready(function() {
        //initialize the javascript
        App.init();        
        $('div.alert').not('.alert-important').delay(3000).slideUp(300);
        $('.select2').select2();
    });

    $('#goto-order').click(function (event) {
        var url = $(event.target).attr('data-url');
        var id = $('#goto-order-number').val();
        window.location = url.replace('_ID_', id);
    });

    $('#goto-order-number').keypress(function (event) {
        // Make the default action of hitting enter to attempt to save the current row
        if (event.which == '13') {
            $('#goto-order').click();
        }
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/bower_components/handlebars/handlebars.min.js') }}"></script>
    <script src="{{ asset('/bower_components/rangy-official/rangy-core.min.js') }}"></script>
    <script src="{{ asset('/bower_components/rangy-official/rangy-classapplier.min.js') }}"></script>
    <script src="{{ asset('/bower_components/rangy-official/rangy-highlighter.min.js') }}"></script>
    <script src="{{ asset('/bower_components/rangy-official/rangy-selectionsaverestore.min.js') }}"></script>
    <script src="{{ asset('/bower_components/rangy-official/rangy-serializer.min.js') }}"></script>
    <script src="{{ asset('/bower_components/rangy-official/rangy-textrange.min.js') }}"></script>
    <script src="{{ asset('/bower_components/x-editable/dist/bootstrap3-editable/js/bootstrap-editable.min.js') }}"></script>
    <script src="{{ asset('/bower_components/wysihtml5x/dist/wysihtml5x.min.js') }}"></script>
    <script src="{{ asset('/bower_components/wysihtml5x/dist/wysihtml5x-toolbar.min.js') }}"></script>
    <script src="{{ asset('/bower_components/bootstrap3-wysiwyg/dist/bootstrap3-wysihtml5.min.js') }}"></script>
    <script src="{{ asset('/bower_components/x-editable/dist/inputs-ext/wysihtml5/wysihtml5.js') }}"></script>  
    <script src="{{ asset('/bower_components/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('/bower_components/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('/bower_components/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('/bower_components/flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('/bower_components/icheck/icheck.min.js') }}"></script>
    <script src="{{ asset('/js/validation/formValidation.min.js') }}"></script>
    <script src="{{ asset('/js/validation/bootstrap.min.js') }}"></script>
    
    <!-- Include custom JS, if the file exists -->
    @if (file_exists('js/views/'.(Request::segment(1)?:'index').'/'.(Request::segment(2)?:'index').'.js'))
    <!-- Attempting to find: {{ 'js/views/'.(Request::segment(1)?:'index').'/'.(Request::segment(2)?:'index').'.js' }} -->
    <script src="{{ asset('/js/views/'.(Request::segment(1)?:'index').'/'.(Request::segment(2)?:'index').'.js') }}"></script>
    @elseif (file_exists('js/views/'.Request::segment(1).'.js'))
    <!-- Attempting to find: {{ 'js/views/'.Request::segment(1).'.js' }} -->
    <script src="{{ asset('/js/views/'.Request::segment(1).'.js') }}"></script>
    @endif

    @yield('javascript')

    <!-- Include custom JS files -->
    <script src="{{ asset('/js/views/global.js') }}"></script>

</body>

</html>
