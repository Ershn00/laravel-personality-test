@extends('layout')
@section('content')
    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <h2>You are an</h2>
    </div>
    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <h1 class="mb-3 display-2 fw-bolder" style="color: #721c24;">{{ strtoupper($personality) }}</h1>
    </div>
    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <h1>Your Score: {{ $score }}</h1>
    </div>
@endsection
