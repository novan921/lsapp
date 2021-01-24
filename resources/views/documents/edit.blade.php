@extends('layouts.app')

@section('content')
    <h1>Edit Document</h1>
    {!! Form::open(['action' => ['DocumentsController@update', $document->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('judul', 'Judul')}}
            {{Form::text('judul', {{$document->judul}}, ['class' => 'form-control', 'placeholder' => 'Judul'])}}

        </div>
        <div class="form-group">
            {{Form::label('tanggal', 'Tanggal')}}
            {{Form::date('tanggal', {{$document->tanggal}}, ['class' => 'form-control', 'placeholder' => 'Tanggal'])}}

        </div>
        <div class="form-group">
            {{Form::label('nomor_surat', 'Nomor Surat')}}
            {{Form::text('nomor_surat', {{$document->nomor_surat}}, ['class' => 'form-control', 'placeholder' => 'Nomor Surat'])}}

        </div>
        <div class="form-group">
            {{Form::label('jenis_surat', 'Jenis Surat')}}<br>
            {{Form::select('jenis_surat', 
            [
                'Surat Masuk' => 'Surat Masuk', 
                'Surat Keluar' => 'Surat Keluar',
                'Undangan' => 'Undangan',
                'Nota Dinas' => 'Nota Dinas',
                'Minute of Meeting' => 'Minute of Meeting (MoM)',
                'Laporan' => 'Laporan'
            ], 
            ['class' => 'form-control', 'placeholder' => 'Jenus Surat'])}}

        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection