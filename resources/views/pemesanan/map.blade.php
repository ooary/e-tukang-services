@extends('layouts.layoutAdmin')

@section('page_header_title','Peta Lokasi Pelanggan')
@section('page_title','Peta Lokasi Pelanggann')
@section('page_child_title','Peta Lokasi Pelanggan')
@section('content')

    <div id="map" ></div>
  
@endsection
@section('custom_js')

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAnt59B7n7Q2mHB0qC3-5ZIE1MWyeDPQF8&sensor=false"></script>
<script src="{{asset('js/gmaps.min.js')}}"></script>
<script>

    var map = new GMaps({
      div:"#map",
        lat:{{$payload->lat}},
      lng:{{$payload->long}},
      width:'1000px',
      height:'500px',
    
      
    });
    map.addMarker({
      lat:{{$payload->lat}},
      lng:{{$payload->long}},
           zoom: 12,
        zoomControl: true,
        zoomControlOpt: {
            style: 'SMALL',
            position: 'TOP_LEFT'
        },  
      infoWindow: {
      content: '<p>Lokasi Pelanggan </p>'
      }
    })


</script>
@endsection