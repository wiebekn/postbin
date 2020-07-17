@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{--   Element for vue to get the id  --}}
        <input type="hidden" id="uuid" value="{{ $objBin->uuid }}">

        <div class="col-md-10">
            <bin-component></bin-component>
        </div>
    </div>
</div>
@endsection
