@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    @if(count($services) > 0)
        <ul class="list-group">
            @foreach ($services as $service)
                <li class="list-group-item">{{$loop->index}} {{$service}}
                @if ($loop->first)
                    <span> - first in the loop</span>
                @endif
                @if ($loop->last)
                    <span> - last in the loop</span>
                @endif
                </li>
            @endforeach
        </ul>
        
    @endif
@endsection


