@extends('layout')

@section('styles')
  @include('share.flatpickr.styles')
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">フォルダを削除する</div>
          <div class="panel-body">
              <div class="form-group">
                <label for="title">フォルダ名</label><br/>
                <a>
                  {{ $folder->title }}
                </a>
              </div>
              <div class="alert alert-danger" role="alert">本当に削除しますか？</div>
              <form action='{{ route('folders.remove', ['folder' => $folder->id]) }}' method='post'>
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