@extends('layouts.app')

@section('content')
    <a href="/documents" class="btn btn-light mb-3" role="button"><i class="fa fa-angle-double-left"></i> Go Back</a>
    <h1>{{$document->judul}}</h1>
    <hr>
    <div class="row">
        <div class="col-sm-6">
            <div>
                <h6>Tanggal dibuat</h6>
                <h5><b>{!!$document->tanggal!!}</b></h5>
            </div>
            <div>
                <h6>Nomor Surat</h6>
                <h5><b>{!!$document->nomor_surat!!}</b></h5>
            </div>
            <div>
                <h6>Jenis Surat</h6>
                <h5><b>{!!$document->jenis_surat!!}</b></h5>
            </div>
            <hr>
            <small>Created at {{$document->created_at}}</small><br>
            <small>Updated at {{$document->updated_at}}</small>
            <hr>
            @guest
                @else
                <div class="d-flex flex-row">
                    <div class="pr-2">
                        <a href="/documents/{{$document->id}}/edit" class="btn btn-primary">Edit</a>
                    </div>
                    <div class="">
                        {!!Form::open(['action' => ['DocumentsController@destroy', $document->id], 'method' => 'POST', 'class' => ''])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        {!!Form::close()!!}
                    </div>
                </div>
            @endguest
        </div>
    </div>
    
@endsection