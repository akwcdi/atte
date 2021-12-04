@php
$title = 'atte';
@endphp

@extends('layout')

@section('content')

<h1 class="d-flex justify-content-start">Atte</h1>
<div class="d-flex justify-content-end">
  <div type="submit" name="index">
        {{ Form::open(['route' => 'index','class' => 'align-items-center','method' => 'POST']) }}
          {{ csrf_field() }}
            {{ Form::submit('打刻画面', ['class' => 'btn btn-outline-secondary align-items-center h-100 w-100']) }}
        {{ Form::close() }}
  </div>

  <div type="submit" name="index">
        {{ Form::open(['route' => 'index','class' => 'align-items-center','method' => 'POST']) }}
          {{ csrf_field() }}
            {{ Form::submit('社員一覧', ['class' => 'btn btn-outline-secondary align-items-center h-100 w-100']) }}
        {{ Form::close() }}
  </div>
  <button class="btn btn-outline-secondary" onClick="(function(){document.getElementById('logout-form').submit();return false;})();">ログアウト</button>
  {{ Form::open(['route' => 'logout', 'id' => 'logout-form']) }}
  {{ Form::close() }}
</div>

<div class="d-flex justify-content-center">
  <h2>勤怠一覧</h2>
</div>



<div class="d-flex justify-content-center">
  <table class="table">
  <tr>
    <th>名前</th>
    <th>勤務開始</th>
    <th>勤務終了</th>
    <th>休憩開始</th>
    <th>休憩終了</th>
  </tr>
  @foreach ($items as $item)
  <tr>
    <td>
      {{$item->getDetail()}}
    </td>
    <td>
      @foreach ($item->atte as $obj)
      {{$obj->getEnter()}}
      @endforeach
    </td>
    <td>
      @foreach ($item->atte as $obj)
      {{$obj->getExit()}}
      @endforeach
    </td>
    <td>
      @foreach ($item->atte as $obj)
      {{$obj->getReststart()}}
      @endforeach
    </td>
    <td>
      @foreach ($item->atte as $obj)
      {{$obj->getRestend()}}
      @endforeach
    </td>
  </tr>
  @endforeach
</table>
</div>

<div class="d-flex justify-content-center">
  {{ $items->links() }}
</div>

@endsection