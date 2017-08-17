@extends('layouts.layoutAdmin')
@section('page_header_title','Dashboard')
@section('custom_css')

{!! Charts::assets() !!}
@endsection
@section('page_title','Dashboard')
@section('content')
<div class="row tile_count">
	<div class="col-lg-4 tile_stats_count">
		<span class="count_top"><i class="fa fa-user"></i> Total Jumlah Pelanggan</span>
		<div class="count">{{$pelanggan}}</div>
	</div>
	
	<div class="col-lg-4 tile_stats_count">
		<span class="count_top"><i class="fa fa-user"></i> Total Jumlah Tukang</span>
		<div class="count green">{{$tukang}}</div>
	</div>
	<div class="col-lg-4 tile_stats_count">
		<span class="count_top"><i class="fa fa-user"></i> Total Jumlah Pemesanan</span>
		<div class="count">{{$pemesanan}}</div>
	</div>
	
</div>
<center>
{!! $chart->render() !!}
</center>

@endsection