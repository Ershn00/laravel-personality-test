@extends('layout')
@section('content')

    <div class="col-sm-3 mb-3">
        <a href="{{ route('questions.index') }}" type="button" class="btn btn-primary btn-sm">Back to List</a>
    </div>
    <div class="card">
        <div class="card-header">
            Edit Question
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('questions.update', $id) }}">
                <div class="mb-3">
                    @csrf
                    @method('PATCH')
                    <label for="question">Question:</label>
                    <input type="text" class="form-control" name="question" value="{{ $question_title }}"/>
                </div>
                <div class="mb-3">
                    <label for="choice_1">Choice #1:</label>
                    <input type="text" class="form-control" name="choice_1" value="{{ $choice_1 }}"/>
                    <label for="choice_2">Choice #2:</label>
                    <input type="text" class="form-control" name="choice_2" value="{{ $choice_2 }}"/>
                    <label for="choice_3">Choice #3:</label>
                    <input type="text" class="form-control" name="choice_3" value="{{ $choice_3 }}"/>
                    <label for="choice_4">Choice #4:</label>
                    <input type="text" class="form-control" name="choice_4" value="{{ $choice_4 }}"/>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-block btn-primary">Update Question</button>
                </div>
            </form>
        </div>
    </div>
@endsection
