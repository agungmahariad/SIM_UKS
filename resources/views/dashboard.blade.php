
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
				<a class="navbar-brand" href="#"><span>UKS</span>Wikrama</a>
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
			<li class="active"><a href="{{ url('dashboard') }}"><svg class="glyph stroked dashboard home"><use xlink:href="#stroked-home"></use></svg> Dashboard</a></li>
			<li class="parent">
				<a href="">
					<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Data 
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li>
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
			<li><a href="{{ url('obat') }}"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"></use></svg> Obat</a></li>
			<li><a href="{{ url('laporan') }}"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg> Laporan</a></li>
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
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->

		<div class="col-xs-12 col-md-6 col-lg-6">
			<div class="row">
				<div class="col-xs-12 col-md-6 col-lg-6">
					<div class="panel panel-blue panel-widget" style="height: 100px;">
						<div class="row no-padding">
							<div class="col-sm-3 col-lg-5 widget-left" style="height: 100px;">
								<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
							</div>
							<div class="col-sm-9 col-lg-7 widget-right" style="height: 100px;">
								<div class="large">{{ $data['datapasien']->count()}}</div>
								<div class="text-muted">Murid sakit hari ini</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-md-6 col-lg-6">
					<div class="panel panel-orange panel-widget" style="height: 100px;">
						<div class="row no-padding">
							<div class="col-sm-3 col-lg-5 widget-left" style="height: 100px;">
								<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
							</div>
							<div class="col-sm-9 col-lg-7 widget-right" style="height: 100px;">
								<div class="large">{{ $data['bulan']->count() }}</div>
								<div class="text-muted">Murid sakit minggu ini</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-md-6 col-lg-6">
					<div class="panel panel-teal panel-widget" style="height: 100px;">
						<div class="row no-padding">
							<div class="col-sm-3 col-lg-5 widget-left" style="height: 100px;">
								<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
							</div>
							<div class="col-sm-9 col-lg-7 widget-right" style="height: 100px;">
								<div class="large">{{$data['bulan']->count()}}</div>
								<div class="text-muted">Murid sakit bulan ini</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-md-6 col-lg-6">
					<div class="panel panel-red panel-widget" style="height: 100px;">
						<div class="row no-padding">
							<div class="col-sm-3 col-lg-5 widget-left" style="height: 100px;">
								<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
							</div>
							<div class="col-sm-9 col-lg-7 widget-right" style="height: 100px;">
								<div class="large">{{ $data['datapasien']->count() }}</div>
								<div class="text-muted">Total Pasien</div>
							</div>
						</div>
					</div>
				</div>
			</div><!--/.row-->
		</div>
		<div class="col-xs-12 col-md-6 col-lg-6">
			<div class="row">
				<div class="panel panel-default" style="height: 220px;">
					<div class="panel-heading"">
						<span>Obat tersedia</span>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<table class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<td>No</td>
											<td>Obat</td>
											<td>Kegunaan</td>
											<td>Stok</td>
											<td>Expire</td>
										</tr>
									</thead>
									<tbody>
										@foreach ($data['dataobat'] as $row)
											<tr>
												<td>{{ $loop->index +1 }}</td>
												<td>{{ $row->obat }}</td>
												<td>{{ $row->kegunaan }}</td>
												<td>{{ $row->stok }}</td>
												<td>{{ $row->expire }}</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<a href="{{ url('pasien') }}" class="btn btn-primary"><svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"></use></svg><span>Tambah Pasien</span></a></div>
					<div class="panel-body">
					@if(session('message'))
						<div class="row">
							<div class="col-sm-12">
								<div class="alert alert-success">
									{{ session('message') }}
								</div>
							</div>
						</div>
					@endif
					<div class="row">
						<div class="col-lg-12">
							<table class="table table-bordered table-striped table-hover">
								<thead>
								<tr>
									<td align="center">No</td>
									<td align="center">Nis</td>
									<td align="center">Nama</td>
									<td align="center">Keterangan Sakit</td>
									<td align="center">Obat</td>
									<td align="center">Jumlah Obat</td>
									<td align="center">Tanggal Masuk</td>
									<td width="148" align="center">Aksi</td>
								</tr>
							</thead>
							<tbody>
								@if (count($data['datapasien']))
									@foreach($data['datapasien'] as $row)
										<tr>
											<td>{{ $loop->index + 1 }}</td>
											<td>{{ $row->nis }}</td>
											<td>{{ $row->nama }}</td>
											<td>{{ $row->keterangan }}</td>
											<td>{{ $row->obat }}</td>
											<td>{{ $row->jumlah_obat }}</td>
											<td>{{ $row->tanggal_masuk }}</td>
											<td align="center">
												<a href="{{ url('deletepasien/'.$row->id) }}" class="btn btn-danger" onClick="return confirm('Hapus ?')">Hapus</a>
											</td>
										</tr>
									@endforeach
								@else
									<td colspan="8" align="center">Tidak ada data !</td>
								@endif
							</tbody>
							</table>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
								
		
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
