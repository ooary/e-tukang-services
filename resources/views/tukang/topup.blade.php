@extends('layouts.layoutAdmin')
@section('custom_css')
     <link href="{{asset('css/parsley.css')}}" rel="stylesheet">
@endsection
@section('page_header_title','Data Tukang')
@section('page_title','Data Tukang')
@section('page_child_title','Daftar Data Tukang')
@section('content')       
                    
 	{{Form::model($data,['route'=>['tukang.topup',$data],'method'=>'put','files'=>true,'data-parsley-validate'=>"parsley"])}}
      @include('tukang._topup')
    {{Form::close()}}
            
 @endsection 
 @section('custom_js')
  <script src="{{asset('js/parsley.config.js')}}"></script>
  <script src="{{asset('js/parsley.min.js')}}"></script>
 @endsection