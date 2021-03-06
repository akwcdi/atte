@php
$title = 'atte';
@endphp

@extends('layout')

@section('content')
<div class="d-flex justify-content-end ">
  <div type="submit" name="attendance">
        {{ Form::open(['route' => 'attendance','class' => 'align-items-center','method' => 'POST']) }}
          {{ csrf_field() }}
            {{ Form::submit('勤怠画面', ['class' => 'btn btn-outline-secondary align-items-center h-100 w-100']) }}
        {{ Form::close() }}
  </div>
  <button class="btn btn-outline-secondary" onClick="(function(){document.getElementById('logout-form').submit();return false;})();">ログアウト</button>
  {{ Form::open(['route' => 'logout', 'id' => 'logout-form']) }}
  {{ Form::close() }}
</div>

<div class="vh-100">
    <div class="h-50 d-flex align-items-center justify-content-around">
      <div type="submit" name="enter_time" class="h-50 w-25">
        {{ Form::open(['route' => 'enter_time','class' => 'align-items-center h-50 w-100','method' => 'POST']) }}
          {{ csrf_field() }}
            {{ Form::submit('出勤', ['name' => 'enter_time', 'class' => 'btn btn-lg btn-outline-secondary align-items-center h-100 w-100']) }}
        {{ Form::close() }}
      </div>

      <div type="submit" name="exit_time" class="h-50 w-25">
        {{ Form::open(['route' => 'exit_time','class' => 'align-items-center h-50 w-100','method' => 'POST']) }}
          {{ csrf_field() }}
            {{ Form::submit('退勤', ['class' => 'btn btn-lg btn-outline-secondary align-items-center h-100 w-100']) }}
        {{ Form::close() }}
      </div>
    </div>

    <div class="h-50 d-flex align-items-center justify-content-around">
      <div type="submit" name="reststart_time" class="h-50 w-25">
        {{ Form::open(['route' => 'reststart_time','class' => 'align-items-center h-50 w-100','method' => 'POST']) }}
          {{ csrf_field() }}
            {{ Form::submit('休憩開始', ['class' => 'btn btn-lg btn-outline-secondary align-items-center h-100 w-100']) }}
        {{ Form::close() }}
      </div>

      <div type="submit" name="restend_time" class="h-50 w-25">
        {{ Form::open(['route' => 'restend_time','class' => 'align-items-center h-50 w-100','method' => 'POST']) }}
          {{ csrf_field() }}
            {{ Form::submit('休憩終了', ['class' => 'btn btn-lg btn-outline-secondary align-items-center h-100 w-100']) }}
        {{ Form::close() }}
      </div>
    </div>
</div>

@endsection