
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>UKS</title>

<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/datepicker3.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">

<!--Icons-->
<script src="{{ asset('assets/js/lumino.glyphs.js')}}"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>Lumino</span>Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> {{ session('nama') }} <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ url('logout')}}"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li><a href="{{ url('dashboard') }}"><svg class="glyph stroked dashboard home"><use xlink:href="#stroked-home"></use></svg> Dashboard</a></li>
			<li class="parent active">
				<a href="">
					<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Data 
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li class="active">
						<a class="" href="{{ url('rayon') }}">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Rayon
						</a>
					</li>
					<li>
						<a class="" href="{{ url('rombel') }}">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Rombel
						</a>
					</li>
					<li>
						<a class="" href="{{ url('jurusan') }}">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Jurusan
						</a>
					</li>
					<li>
						<a class="" href="{{ url('murid') }}">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Siswa
						</a>
					</li>
				</ul>
			</li>
			<li><a href="widgets.html"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Widgets</a></li>
			<li><a href="widgets.html"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Widgets</a></li>
			<li role="presentation" class="divider"></li>
			<li><a href="login.html"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Login Page</a></li>
		</ul>
		<div class="attribution"></div>
	</div>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Data Siswa</h1>
			</div>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<span>Mengubah Data</span>
					</div>
					<div class="panel-body">
						@if ($errors->any())
							@foreach($errors->all() as $element)
								<div class="row">
									<div class="col-sm-12">
										<div class="alert alert-danger">
											{{ $element }}
										</div>
									</div>
								</div>
							@endforeach
						@endif
						<div class="col-md-6">
							<form method="post" action="{{ url('updatemurid/'.$data->nis) }}">
								@csrf @method('patch')
								<div class="form-group">
									<label>nis</label>
									<input type="number" class="form-control" name="nis" value="{{ $data->nis }}" required disabled>
									<label>Nama Siswa</label>
									<input type="text" class="form-control" name="nama" value="{{ $data->nama }}" required>
									<label>Jurusan</label>
									<select class="form-control" id="datajurusan" name="jurusan">
										<option value="">Pilih Jurusan</option>
										@foreach($datajurusan as $row)
											@if ($row->jurusan == $data->jurusan)
												<option value="{{ $row->jurusan }}" selected>{{ $row->jurusan }}</option>
											@else
												<option value="{{ $row->jurusan }}">{{ $row->jurusan }}</option>
											@endif
										@endforeach
									</select>
									<label>Rombel</label>
									<select class="form-control" id="datarombel" name="rombel">
										<option value="">Pilih Rombel</option>
										@foreach($datarombel as $row)
											@if ($row->rombel == $data->rombel)
												<option value="{{ $row->rombel }}" selected>{{ $row->rombel }}</option>
											@else
												<option value="{{ $row->rombel }}">{{ $row->rombel }}</option>
											@endif
										@endforeach
									</select>
									<label>Rayon</label>
									<select class="form-control" id="datarayon" name="rayon">
										<option value="">Pilih Rayon</option>
										@foreach($datarayon as $row)
											@if ($row->rayon == $data->rayon)
												<option value="{{ $row->rayon }}" selected>{{ $row->rayon }}</option>
											@else
												<option value="{{ $row->rayon }}">{{ $row->rayon }}</option>
											@endif
										@endforeach
									</select>
								</div>
								<input type="submit" name="ubah" class="btn btn-primary" value="Ubah">
								<a href="{{ url('murid') }}" class="btn btn-success">Kembali</a>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>
	</div>	<!--/.main-->

	<script src="{{ asset('assets/js/jquery-1.11.1.min.js')}}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
	<script src="{{ asset('assets/js/chart.min.js')}}"></script>
	<script src="{{ asset('assets/js/chart-data.js')}}"></script>
	<script src="{{ asset('assets/js/easypiechart.js')}}"></script>
	<script src="{{ asset('assets/js/easypiechart-data.js')}}"></script>
	<script src="{{ asset('assets/js/bootstrap-datepicker.js')}}"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
