@extends('layouts.index')
<style>

</style>
@section('content')
<div class="animated fadeInRightBig">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5> Master Anggota </h5>
                    <div class="ibox-tools">
                        <a href="{{ url('Master/Anggota/create') }}" class="btn btn-primary btn-label">
                            <b><i class="fa fa-plus"></i></b>
                            Tambah Anggota
                        </a>
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ session('success') }}
                </div>
                @endif
                @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ session('error') }}
                </div>
                @endif
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table id="table-member" class="table table-condensed table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No Telp</th>
                                    <th>Masa Aktif</th>
                                    <th>Status</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($member as $item => $value)
                                <tr class="gradeX">
                                    <td>{{ $item+1 }}</td>
                                    <td>{{ $value->nomor }}</td>
                                    <td>
                                        <a href="{{ url('Master/Anggota/'.$value->id.'/edit') }}"> {{ $value->name }} </a>
                                    </td>
                                    <td>{{ $value->email }}</td>
                                    <td>{{ $value->phone }}</td>
                                    <td>{{ $value->expired }}</td>
                                    @if ($value->status == 'Active')
                                        <td>{{ $value->status }}</td>
                                    @else
                                       <td> <a href="{{ url('Master/Anggota/'.$value->id.'/active') }}"> {{ $value->status }}</td> </a>
                                    @endif
                                    
                                    <td>
                                        {{-- <form id="delete-{{$value->id}}"
                                            action="{{ action('Master\MemberController@destroy', ['id' => $value->id]) }}" method="POST"
                                            style="display: none;">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>

                                        <a class="btn btn-sm btn-danger" onclick="remove({{$value->id}})"><i class="glyphicon glyphicon-trash"></i></a> --}}
                                        <a href="{{ url('Master/Anggota/'.$value->id.'/show') }}" class="btn btn-sm btn-success"> 
                                            <i class="glyphicon glyphicon-eye-open"></i>
                                        </a>
                                    </td>
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
@endsection
