
<!-- layout.blade.phpを読み込む -->
@extends('layout')

@section('title','一覧')

@section('content')
<a href="{{ route('diary.create') }}" class="btn btn-primary btn-block mt-3">NEW</a>
  @foreach($diaries as $diary)
    <div class="m-4 p-4 border border-primary">
    <p>{{$diary->title}}</p>
    <p>{{$diary->body}}</p>
    <p>{{$diary->created_at}}</p>

    <a href="{{ route('diary.edit',['id' => $diary->id]) }}" class="btn btn-success">編集</a>

    <form action="{{ route('diary.destroy',['id' => $diary->id]) }}" method="POST" class="d-inline">
    @csrf
    @method('delete')
      <button class="btn btn-danger">削除</button>
    </form>

    </div>
  @endforeach

@endsection