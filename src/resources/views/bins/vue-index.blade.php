@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{--   Element for vue to get the id  --}}
        <input type="hidden" id="appId" value="{{ $objUser->id }}">

        <div class="col-md-8">
            <bin-list-component></bin-list-component>
        </div>
    </div>
</div>
@endsection
