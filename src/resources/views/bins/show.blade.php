@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @foreach($objBinItems as $objItem)
            <div class="card">
                <div class="card-header">{{ $objItem->method }} {{ $objItem->url }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm">
                            <table class="table table-sm">
                                <thead>
                                <tr>
                                    <th scope="col">key</th>
                                    <th scope="col">value</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(unserialize($objItem->header) as $key => $headerItem)
                                <tr>
                                    <th scope="row">{{$key}}</th>
                                    <th>{{ \Illuminate\Support\Str::limit($headerItem[0], 25, $end='...') }}</th>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm">
                            {{ unserialize($objItem->content) }}
                        </div>
                    </div>


                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
