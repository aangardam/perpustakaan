@extends('layouts.index')

@section('content')
<div class="animated fadeInRightBig">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5> Master Denda Keterlambatan </h5>
					<div class="ibox-tools">
						<a class="collapse-link">
							<i class="fa fa-chevron-up"></i>
						</a>
						{{-- <a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<i class="fa fa-wrench"></i>
						</a>
						<ul class="dropdown-menu dropdown-user">
							<li><a href="#">Config option 1</a>
							</li>
							<li><a href="#">Config option 2</a>
							</li>
						</ul>
						<a class="close-link">
							<i class="fa fa-times"></i>
						</a> --}}
					</div>
				</div>
				<div class="ibox-content">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover dataTables-example" >
							<thead>
								<tr>
									<th>No</th>
									<th>Biaya Denda</th>
								</tr>
							</thead>
							<tbody>
                                
                                @foreach ($denda as $item => $value)
                                    <tr class="gradeX">
                                        <td>{{ $item+1 }}</td>
                                        <td>
                                            <a href="{{ url('Master/Denda/'.$value->id.'/edit') }}"> {{ number_format($value->price) }} </a>
                                        </td>
                                    </tr>  
                                @endforeach
							</tfoot>
						</table>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
