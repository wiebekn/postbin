@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bins</div>
                <div class="card-body">
                    <ul>
                    @foreach($bins as $bin)
                        <li><a href="{{ route('bins.show', $bin->uuid) }}">{{ $bin->uuid }}</a></li>
                    @endforeach
                    </ul>

                    <a class="btn btn-primary" href="#"
                       onclick="event.preventDefault();
                           document.getElementById('create').submit();">
                        Create
                    </a>

                    <form id="create" action="{{ route('bins.store',[]) }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
