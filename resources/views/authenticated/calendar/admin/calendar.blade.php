@extends('layouts.sidebar')

@section('content')
<div class="vh-100 pt-5" style="background:#ECF1F6;">
  <div class="border w-75 m-auto pt-5 pb-5" style="border-radius:5px; background:#FFF;">
    <p class="calendar-title">{{ $calendar->getTitle() }}</p>
    <div class="w-75 m-auto border" style="border-radius:5px; height:82%">
          {!! $calendar->render() !!}
    </div>
  </div>
</div>
@endsection
