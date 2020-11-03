@extends('layout')

@section('styles')
  @include('share.flatpickr.styles')
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">タスクを削除する</div>
          <div class="panel-body">
              <div class="form-group">
                <label for="title">タイトル</label><br/>
                {{ $task->title }}
              </div>
              <div class="form-group">
                <label for="status">状態</label><br/>
                <span class="label {{ $task->status_class }}">{{ $task->status_label }}</span>
              </div>
              <div class="form-group">
                <label for="due_date">期限</label><br/>
                {{ $task->formatted_due_date }}
              </div>
              <div class="alert alert-danger" role="alert">本当に削除しますか？</div>
              <form action='{{ route('tasks.remove', ['folder' => $task->folder_id, 'task' => $task->id]) }}' method='post'>
                @method('DELETE')
                @csrf
                <div class="text-right">
                  <a href="/" class="btn btn-default">戻る</a>
                  <button type='submit' class="btn btn-danger">削除</button>
                </div>
              </form>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection