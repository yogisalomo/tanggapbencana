@extends('layouts.master')

@section('script')

    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap.css')}}">
    <script src="{{asset('js/jquery.dataTables.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap.js')}}"></script>

    <script>

        $(document).ready(function() {
            var table = $('#table').dataTable({
               "scrollX": true
            });

            $('#syncSMS').click(function(){
                var URL = '<?=URL::to('/sms/recvSync');?>';
                $.get(URL, function( data ) {
                    table.fnDraw();
                    alert(data);
                });
            });

            $('#sendSMSB').click(function(){
                var isi_sms = $("#sendSMS").val();
                if (isi_sms == "") alert("Isi pesan terlebih dahulu");
                else {
                    //alert(isi_sms);
                    var URL = '<?=URL::to('/sms/send/');?>/';
                    URL = URL+isi_sms;
                    window.open(URL);
                }
            });
        });
    </script>

@stop

@section('content')
<h3>SMS Requets</h3>
<div class="row">
    <div class="col-lg-4">
        <div class="well">
            <a href="#SMSSync" id="syncSMS">Sync from SMS Gateway</a><br>
            Kirim SMS (demo) :
            <input type="text" id="sendSMS"> <button type="btn btn-primary" id="sendSMSB">Kirim</button>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="well"> <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Pengirim</th>
                    <th>Nama Bencana</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Judul Laporan</th>
                    <th>Isi Laporan</th>
                </tr>
            </thead>
     
     
            <tbody>
                @foreach ($smses as $S)
                    <tr>
                        <td>+628561435232</td>
                        <td>
                        <?php 
                        if (strpos($S->nama_disaster,"asu") !== false) {
                            echo "testing";
                        } else echo $S->nama_disaster;
                        ?>
                        </td>
                        <td >{{$S->lattitude}}</td>
                        <td >{{$S->longitude}}</td>
                        <td >{{$S->judul_laporan}}</td>
                        <td >{{$S->isi_laporan}}</td>
                    </tr>
                @endforeach            
            </tbody>
        </table> </div>
    </div>
</div>    
@stop