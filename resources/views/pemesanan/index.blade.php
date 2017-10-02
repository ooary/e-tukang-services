@extends('layouts.layoutAdmin')
@section('custom_css')
<link href="{{asset('css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('css/responsive.bootstrap.min.css')}}" rel="stylesheet">
@endsection
@section('page_header_title','Data Pemesanan')
@section('page_title','Data Pemesanan')
@section('page_child_title','Daftar Data Pemesanan')
@section('content')
<a href="{{url('pemesanan/report')}}" class="btn btn-primary pull-right">Report </a>
<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th>Judul Pemesanan</th>
      <th>Nama Pemesan</th>
      <th>No Hp Pelanggan</th>
      <th>Alamat</th>
      <th>Tanggal Pemesanan </th>
      <th>Nama Tukang</th>
      <th>Foto Kerusakan</th>
      <th>Status Pemesanan</th>
      <th>Aksi</th>
      
    </tr>
  </thead>
  <tbody>
  @foreach($data as $d)
    <tr>
      <td>{{$d->nama_kerusakan}}</td>
      <td>{{$d->pelanggan->nama_pelanggan}}</td>
      <td>{{$d->pelanggan->no_hp}}</td>
      <td>{{$d->alamat}}
        {{Form::open(['url'=>'pemesanan/map','class'=>'form-inline','target'=>'blank'])}}
            <input type="hidden" name="id_pemesanan" value="{{$d->id_pemesanan}}">
              <button class="btn btn-warning btn-small">
                <i class="fa fa-map"></i> 
                Lihat Lokasi
              </button>
        {{Form::close()}}</td>
      <td>{{$d->tgl_order}}</td>
      <td>
          {{$d->tukang->nama_tukang}}
      </td>
      <td><img src="{{asset('kerusakan')}}/{{$d->foto}}" width="300" height="300"></td>
      <td>
        @if($d->status_pemesanan =="proses")
          <div for="" class="label label-primary">Proses</div>
        @elseif($d->status_pemesanan=="selesai")
          <div class="label label-success">
            Selesai
          </div>
        @elseif($d->status_pemesanan=="canceled")
          <div class="label label-danger">
            Canceled
          </div>
        @else
          <div class="label label-warning">
            Menuju Ke Lokasi
          </div>
        @endif
      </td>
      <td>
        <button class="btn btn-danger fa fa-trash"></button>
       {{--  <a href="{{url('pemesanan/detail/')}}" class="btn btn-warning fa fa-info-circle"> Detail</a> --}}
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