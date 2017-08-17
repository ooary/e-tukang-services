@extends('layouts.layoutAdmin')
@section('custom_css')
    <link href="{{asset('css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/responsive.bootstrap.min.css')}}" rel="stylesheet">
@endsection
@section('page_header_title','Data Tukang')
@section('page_title','Data Tukang')
@section('page_child_title','Daftar Data Tukang')
@section('page_button')
   <a href="{{url('tukang/tambah')}}" class="btn btn-primary fa fa-plus pull-right">Tambah Data Tukang</a>
@endsection
@section('content')	

    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>Nama Tukang</th>
          <th>No Hp</th>
          <th>Alamat</th>
          <th>Aksi</th>
          
        </tr>
      </thead>
      <tbody>
      @foreach($data as $d)
        <tr>
          <td>{{$d->nama_tukang}}</td>
          <td>{{$d->no_hp}}</td>
          <td>{{$d->alamat}}</td>
          <td>
              {{Form::model($d,['route'=>['tukang.destroy',$d],'method'=>'delete','class'=>'form-inline','onsubmit'=>'return confirm("Yakin Hapus?")'])}}
              <button class="fa fa-trash btn btn-danger"></button>
              {{Form::close()}}
              <a href="{{url('tukang/topup')}}/{{$d->id_tukang}}" class="btn btn-success fa fa-plus">Topup </a>
          </td>
        
        </tr>
      @endforeach
      </tbody>
    </table>
					
@endsection		
@section('custom_js')
  	<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('js/responsive.bootstrap.js')}}"></script>
@endsection
