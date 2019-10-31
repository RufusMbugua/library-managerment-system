@extends('layouts.app')

@section('title','Books')

@section('content')
<div class="container-fluid full-height">
		<div class="row row-height">
			<div class="col-lg-6 content-left">
				<div class="content-left-wrapper">
					<a href="index.html" id="logo"><img src="img/logo.png" alt="" width="49" height="35"></a>
					<div id="social">
						<ul>
							<li><a href="#0"><i class="icon-facebook"></i></a></li>
							<li><a href="#0"><i class="icon-twitter"></i></a></li>
							<li><a href="#0"><i class="icon-google"></i></a></li>
							<li><a href="#0"><i class="icon-linkedin"></i></a></li>
						</ul>
					</div>
                    <!-- /social -->
                    
					<div>
						<figure><img src="img/info_graphic_1.svg" alt="" class="img-fluid"></figure>
						<h2>Recent Books <div>
                                <input class="form-control" type="textbox" placeholder="Search Books.." id="search"/>
                            </div></h2>
                        @include('books.recent')
					</div>
				</div>
				<!-- /content-left-wrapper -->
			</div>
			<!-- /content-left -->

			<div class="col-lg-6 content-right" id="start">
				<div id="wizard_container">
						<!-- /top-wizard -->
						@include('books.add')
					</div>
					<!-- /Wizard container -->
			</div>
			<!-- /content-right-->
		</div>
		<!-- /row-->
	</div>
    <!-- /container-fluid -->
<script>
    $('.search_table').hide();

    $('#search').on('keyup',function(data){
        $value = $(this).val();
        if($value == ''){
            $('.search_table').hide();
        }

        $.ajax({
            type:'get',
            url : '{{url("/")}}/search/books/byName',
            data: {'name':$value},
            success: function(data){
                $('.search_table').show();
                $('tbody').html(data);
            }
        });
    });
</script>
@endsection
