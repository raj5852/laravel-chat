@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        var conn = new WebSocket('ws://127.0.0.1:8090/');
        conn.onopen = function(e){
            console.log("Connection established")
        }
        conn.onmessage = function(e){

        }
    </script>
@endsection
