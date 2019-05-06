<div class="row">
							<div class="col-lg-12">
								<table class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<td width="50" align="center">No</td>
									<td align="center">NIS</td>
									<td align="center">Nama Siswa</td>
									<td align="center">Keluhan</td>
									<td align="center">Obat</td>
									<td align="center">Jumlah Obat</td>
									<td align="center">Tanggal Masuk</td>
								</tr>
							</thead>
							<tbody>
								@if (count($data))
									@foreach($data as $row)
										<tr>
											<td align="center">{{ $loop->index + 1 }}</td>
											<td>{{ $row->nis }}</td>
											<td>{{ $row->nama }}</td>
											<td>{{ $row->keterangan }}</td>
											<td>{{ $row->obat }}</td>
											<td>{{ $row->jumlah_obat }}</td>
											<td>{{ $row->tanggal_masuk }}</td>
										</tr>
									@endforeach
								@else
									<td colspan="4" align="center">Tidak ada data !</td>
								@endif
							</tbody>
						</table>
							</div>
						</div>