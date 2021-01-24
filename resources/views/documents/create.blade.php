@extends('layouts.app')

@section('content')
    <h1>Create Document</h1>
    <div class="row">
        <div class="col-sm-6">
            {!! Form::open(['action' => 'DocumentsController@store', 'method' => 'POST']) !!}
            <div class="form-group">
                {{Form::label('judul', 'Judul')}}
                {{Form::text('judul', '', ['class' => 'form-control', 'placeholder' => 'Judul'])}}

            </div>
            <div class="form-group">
                {{Form::label('tanggal', 'Tanggal')}}
                {{Form::date('tanggal', \Carbon\Carbon::now(), ['class' => 'form-control', 'placeholder' => 'Judul'])}}

            </div>
            <div class="form-group">
                {{Form::label('nomor_surat', 'Nomor Surat')}}
                {{Form::text('nomor_surat', '', ['class' => 'form-control', 'placeholder' => 'Nomor Surat'])}}

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
            {{-- <div class="form-group">
                {{Form::label('body', 'Body')}}
                {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}

            </div> --}}
            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
            {!! Form::close() !!}
        </div>
        <div class="col"></div>
    </div>
    
@endsection