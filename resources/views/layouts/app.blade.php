<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Wilio Survey, Quotation, Review and Register form Wizard by Ansonika.">
    <meta name="author" content="Ansonika">

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,600" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/menu.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link href="css/vendors.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">
	
	<!-- MODERNIZR MENU -->
	<script src="js/modernizr.js"></script>
    <title>@yield('title') Library Management System</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/jquery/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/font-awesome-4.6.3/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/iofrm-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/iofrm-theme5.css') }}">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <script src="{{asset('assets/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/jquery/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>

</head>

<div class="modal fade" id="def-modal">
  <div class="modal-dialog">
    <div class="modal-content" id="def-modal-content">
      <div id="modalHeader" class="modal-header">
      </div>
      <div class="modal-body" id="modalBody">
      </div>
      <div class="modal-footer" id="modalFooter">
      </div>
    </div>
  </div>
</div>

<script>
function closeModal(){
  $('#default-modal').modal("hide");
}

function deleteModal(id,item){

  $.get('{{url("/")}}/modal/delete/'+item+'/'+id,function(data){
    $('#def-modal-content').html(data);
  });

  $('#def-modal').modal('show');
}
</script>

<body>
    <div id="preloader">
		<div data-loader="circle-side"></div>
	</div><!-- /Preload -->
	
	<div id="loader_form">
		<div data-loader="circle-side-2"></div>
	</div><!-- /loader_form -->
  <div class="cd-overlay-nav">
		<span></span>
	</div>
	<!-- /cd-overlay-nav -->

	<div class="cd-overlay-content">
		<span></span>
	</div>
	<!-- /cd-overlay-content -->

	<a href="#0" class="cd-nav-trigger">Menu<span class="cd-icon"></span></a>
    <div id="app" style="height:100%">
            @if(\Auth::check())
                @include('layouts.top')
                @if($errors)
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}<span class="close" data-dismiss="alert">&times;</span></div>
                    @endforeach
                @endif
            @endif
            @yield('content')
    </div>
    <style>
      .footer{
        padding:20px;
      }
      .footer-text{
        color:white;
        font-weight:700;

      }
    </style>
    <!-- Scripts -->

    <script>
    function showProfile(){
        $.get('{{url("/")}}/profile',function(data){
            $('.modal-head').html("<h4><span class='fa fa-user'></span> Profile</h4>");
            $('.modal-body').html(data);
        });
        $('#def-modal').modal("show");
    }


    </script>
    <!-- COMMON SCRIPTS -->
	<script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/common_scripts.min.js"></script>
	<script src="js/velocity.min.js"></script>
	<script src="js/functions.js"></script>

	<!-- Wizard script -->
	<script src="js/survey_func.js"></script>
</body>
</html>
