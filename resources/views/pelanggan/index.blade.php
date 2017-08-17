@extends('layouts.layoutAdmin')
@section('custom_css')
    <link href="{{asset('css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/responsive.bootstrap.min.css')}}" rel="stylesheet">
@endsection
@section('page_header_title','Data Pelanggan')
@section('page_title','Data Pelanggan')
@section('page_child_title','Daftar Data Pelanggan')
@section('content')				
    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>Nama Pelanggan</th>
          <th>No Hp</th>
          <th>Alamat</th>
          <th>Tanggal Daftar </th>
          <th>Aksi</th>
          
        </tr>
      </thead>
      <tbody>
      @foreach($data as $d)
        <tr>
          <td>{{$d->nama_pelanggan}}</td>
          <td>{{$d->no_hp}}</td>
          <td>{{$d->alamat}}</td>

          <td>{{$d->created_at->diffForHumans()}}</td>
          <td>
             {{Form::model($d,['route'=>['pelanggan.destroy',$d],'method'=>'delete','class'=>'form-inline','onsubmit'=>'return confirm("Yakin Hapus?")'])}}
                 <button class="fa fa-trash btn btn-danger"></button>
              {{Form::close()}}
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
