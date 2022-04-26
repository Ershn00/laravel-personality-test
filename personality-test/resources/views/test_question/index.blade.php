@extends('layout')
@section('content')
    <div class="col-sm-3 mb-3">
        <a href="{{ route('questions.create') }}" type="button" class="btn btn-success btn-sm">+ Add Question</a>
    </div>
    <h4>List of Questions</h4>
    <table class="table">
        <tbody>
        @foreach($data as $d)
            <tr>
                <td>{{$d->question}}</td>
                <td class="text-center">
                    <a href="{{ route('questions.edit', $d->id)}}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('questions.destroy', $d->id)}}" method="post" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
