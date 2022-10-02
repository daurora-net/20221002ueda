@extends('layouts.default')
@section('content')
<div class="card">
  @if (count($errors) > 0)
  <ul class="errors_txt">
    @foreach ($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
  @endif
  <p class="title mb-15">Todo List</p>
  <div class="todo">
    <form action="/create" method="post" class="flex between">
      @csrf
      <input type="text" name="task" class="input-add">
      <button class="button-add">追加</button>
    </form>
    <table class="mt-30">
      <tr>
        <th>作成日</th>
        <th>タスク名</th>
        <th>更新</th>
        <th>削除</th>
      </tr>
      @foreach ($todos as $todo)
      <tr>
        <td>
          {{$todo->updated_at}}
        </td>
        <form action="/update" method="post">
          @csrf
          <td>
            <input type="hidden" name="id" value="{{$todo->id}}">
            <input type="text" name="task" value="{{$todo->task}}" class="input-update">
          </td>
          <td>
            <button class="button-update">更新</button>
          </td>
        </form>
        <td>
          <form action="/delete" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$todo->id}}">
            <button class="button-delete">削除</button>
          </form>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
@endsection