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
  <link rel="shortcut icon" href="/images/favicon.png">

  <title>{{ env('PROJECT_NAME') }} - {{ ucwords(Request::segment(1)) }}</title>
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800" rel="stylesheet">
  <link href="http://fonts.googleapis.com/css?family=Raleway:300,200,100" rel="stylesheet">

  <!-- Bootstrap -->
  <link href="{{ asset('/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- FA -->
  <link href="{{ asset('fonts/font-awesome-4/css/font-awesome.min.css') }}" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- Custom styles for this template -->
  <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
</head>

<body class="texture">
	<div id="cl-wrapper" class="error-container">
		<div class="page-error">
			<h1 class="number text-center">@yield('error-number')</h1>
			<h2 class="description text-center">@yield('error-description')</h2>
			<h3 class="text-center">Would you like to go <a href="/">home</a>?</h3>
		</div>
	    <div class="text-center out-links"><a href="{{ env('DEVELOPER_WEBSITE') }}" target="_blank">&copy; {{date('Y')}} {{ env('DEVELOPER') }}</a></div>

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('/js/behaviour/general.js') }}"></script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
</body>
</html>
