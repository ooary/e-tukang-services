<!DOCTYPE html>
<html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    @include('report.style')
    {{-- <img src="img/koko1.png" width="100%"> --}}
    <table>
        <tr class="title-row">
            <td colspan="7">
            </td>
        </tr>
        <tr>
            <td colspan="7">&nbsp;</td>
        </tr>
        
        <tr>
            <td>
                
            </td>
            <td colspan="6">
                
            </td>
        </tr>
        
        <tr>
            <td colspan="6">
              
                <h3>Laporan Seluruh Data Jumlah Order</h3>
             
            </td>
            <td>
                
            </td>
        </tr>
        
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr class="header-row">
            <th>Nama Pemesan </th>
            <th>No Hp Pelanggan</th>
            <th>Alamat</th>
            <th>Kerusakan</th>
            <th>Nama Tukang</th>
            {{-- <th>Tanggal Pemesanan</th> --}}
        </tr>
        @foreach($data as $p)
        <tr class="data-row">
            <td>{{$p->pelanggan->nama_pelanggan}}</td>
            <td>{{$p->pelanggan->no_hp}}</td>
            <td>{{$p->alamat}}</td>
            <td>{{$p->nama_kerusakan}}</td>
            <td>{{$p->tukang->nama_tukang}}</td>
            {{-- <th>{{$p->tgl_order}}</th> --}}
           
            
        </tr>
        @endforeach
        <tr class="footer-row">
            <td colspan="8">
                <strong style="text-align: right;"">Jumlah Pelanggan : {{$data->count()}}</strong><br>
                <i>PT Sahabat Anugrah Sejati </i> &copy; {{date('Y')}}
            </td>
        </tr>
    </table>
</html>