@extends('layouts.master')

@section('script')

    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap.css')}}">
    <script src="{{asset('js/jquery.dataTables.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap.js')}}"></script>

    <script>

        $(document).ready(function() {
            $('#table').dataTable({
               "scrollX": true
            });
        });

    </script>

@stop

@section('content')
<h3>SMS Requets</h3>
<div class="row">
    <div class="col-lg-4">
        <div class="well">
            a
        </div>
    </div>
    <div class="col-lg-8">
        <div class="well"> <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
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
                        <td >{{$S->nama_disaster}}</td>
                        <td >{{$S->latitude}}</td>
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