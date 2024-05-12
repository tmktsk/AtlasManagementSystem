@extends('layouts.sidebar')

@section('content')
<div class="vh-100 d-flex" style="align-items:center; justify-content:center;">
  <div class="w-50 m-auto h-75">
    <p><span>{{ $fmtdate }}</span><span class="ml-3">{{ $part }}部</span></p>
    <div class="h-75 border">
      <table class="" style="width:100%;">
        <tr class="text-center">
          <th class="detail_id">ID</th>
          <th class="detail_name">名前</th>
          <th class="detail_place">場所</th>
        </tr>
        @foreach($reservePersons->users as $user)
          <tr class="color-test">
            <td class="w-10">{{ $user->id }}</td>
            <td class="w-25">{{ $user->over_name }}{{ $user->under_name }}</td>
            <td class="w-40">リモート</td>
          </tr>
        @endforeach
      </table>
    </div>
  </div>
</div>
@endsection
