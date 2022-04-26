@extends('layout')
@section('content')
    <form method="post" action="{{ route('result') }}">
        @csrf
    @foreach($questions as $key=>$d)
        <div class="card mb-3">
            <div class="card-header fw-bold">Question: {{ $key+1 }}/{{ $questions->count() }}: {{ $d->question }}</div>
            <ul class="list-group list-group-flush">
                @foreach($d->test_question_choices as $c)
                    <li class="list-group-item">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answer_{{ $key }}" value="{{ $c->score }}">
                            <label class="form-check-label">
                                {{ $c->choice_title }}
                            </label>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
        <input type="hidden" name="question_count" value="{{ $questions->count() }}">
        <div class="mb-3">
            <button type="submit" class="btn btn-block btn-primary">Get Result</button>
        </div>
    </form>
@endsection
