@extends('layouts.sidebar')

@section('content')
<div class="vh-100 pt-5" style="background:#ECF1F6;">
  <div class="border w-75 m-auto pt-5 pb-5" style="border-radius:5px; background:#FFF;">
    <p class="text-center">{{ $calendar->getTitle() }}</p>
    <div class="w-75 m-auto border" style="border-radius:5px; height:82%;">
      <div class="">
        {!! $calendar->render() !!}
      </div>
    </div>
    <div class="text-right w-75 m-auto">
      <input type="submit" class="btn btn-primary" style="margin-top:2%;" value="予約する" form="reserveParts">
    </div>
  </div>
</div>
<div class="modal js-modal">
  <div class="modal__bg js-modal-close"></div>
  <div class="modal__content">
    <div class= "modal-inner-delete">
      <p class="date"></p>
      <p class="time"></p>
    <p>上記の予約をキャンセルしますか？</p>
    <form action="/delete/calendar" method="post" id="deleteParts">
      @csrf
      <input type="hidden" name="getDate" class="date">
      <input type="hidden" name="getPart" class="time">
      <button type="submit">キャンセル</button>
    </form>
    <button class="js-modal-close" href="">閉じる</button>
  </div>
</div>
@endsection
