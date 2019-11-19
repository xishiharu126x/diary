
<!-- layout.blade.phpを読み込む -->
@extends('layouts.app')

@section('title','一覧')

@section('content')

<a href="{{ route('diary.create') }}" class="btn btn-primary btn-block mt-3">新規作成</a>

  @foreach($diaries as $diary)
    <div class="m-4 p-4 border border-primary text-center">
    <p>{{$diary->title}}</p>
    <p>{{$diary->body}}</p>
    <p>{{$diary->created_at}}</p>
    {{-- Auth::check()ログインしてたらtrue,ほかはfalse --}}
    @if (Auth::check() && $diary->user_id == Auth::user()->id)
      <a href="{{ route('diary.edit',['id' => $diary->id]) }}" class="btn btn-success">編集</a>

      <form action="{{ route('diary.destroy',['id' => $diary->id]) }}" method="POST" class="d-inline">
      @csrf
      @method('delete')
        <button class="btn btn-danger">削除</button>
      </form>
    @endif

    </div>
  @endforeach

@endsection