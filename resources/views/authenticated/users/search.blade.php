@extends('layouts.sidebar')

@section('content')
<div class="search_content w-100 border d-flex">
  <div class="reserve_users_area">
    @foreach($users as $user)
    <div class="border one_person">
      <div class="profile_category">
        <span>ID : </span><span>{{ $user->id }}</span>
      </div>
      <div class="profile_category"><span>名前 : </span>
        <a href="{{ route('user.profile', ['id' => $user->id]) }}">
          <span>{{ $user->over_name }}</span>
          <span>{{ $user->under_name }}</span>
        </a>
      </div>
      <div class="profile_category">
        <span>カナ : </span>
        <span>({{ $user->over_name_kana }}</span>
        <span>{{ $user->under_name_kana }})</span>
      </div>
      <div class="profile_category">
        @if($user->sex == 1)
        <span>性別 : </span><span>男</span>
        @elseif($user->sex == 2)
        <span>性別 : </span><span>女</span>
        @else
        <span>性別 : </span><span>その他</span>
        @endif
      </div>
      <div class="profile_category">
        <span>生年月日 : </span><span>{{ $user->birth_day }}</span>
      </div>
      <div class="profile_category">
        @if($user->role == 1)
        <span>権限 : </span><span>教師(国語)</span>
        @elseif($user->role == 2)
        <span>権限 : </span><span>教師(数学)</span>
        @elseif($user->role == 3)
        <span>権限 : </span><span>講師(英語)</span>
        @else
        <span>権限 : </span><span>生徒</span>
        @endif
      </div>
      <div class="profile_category">
        @if($user->subjects->isNotEmpty())
          <span>選択科目：</span>
          @foreach($user->subjects as $subject)
          <span>{{ $subject->subject }}</span>
          @endforeach
        @endif
      </div>
    </div>
    @endforeach
  </div>
  <div class="search_area w-25 border" style="margin-top:3%;">
    <div class="user_search">
      <div>
        <span class="head-search">検索</span>
        <input type="text" class="free_word" name="keyword" placeholder="キーワードを検索" form="userSearchRequest">
      </div>
      <div>
        <lavel style="display:block;">カテゴリ</lavel>
        <select form="userSearchRequest" name="category" class="category-list">
          <option value="name">名前</option>
          <option value="id">社員ID</option>
        </select>
      </div>
      <div>
        <label style="display:block;">並び替え</label>
        <select name="updown" form="userSearchRequest" class="sort-list">
          <option value="ASC">昇順</option>
          <option value="DESC">降順</option>
        </select>
      </div>
      <div class="condition-add">
        <p class="m-0 search_conditions">
          <span class="toggle-search-conditions">検索条件の追加</span>
          <span class="toggle-icon">V</span>
        </p>
        <div class="search_conditions_inner">
          <div style="margin-top:5%;">
            <label class="search-sex">性別</label>
            <span>男</span><input type="radio" name="sex" value="1" form="userSearchRequest">
            <span>女</span><input type="radio" name="sex" value="2" form="userSearchRequest">
            <span>その他</span><input type="radio" name="sex" value="3" form="userSearchRequest">
          </div>
          <div>
            <label class="auth">権限</label>
            <select name="role" form="userSearchRequest" class="engineer">
              <option selected disabled>----</option>
              <option value="1">教師(国語)</option>
              <option value="2">教師(数学)</option>
              <option value="3">教師(英語)</option>
              <option value="4" class="">生徒</option>
            </select>
          </div>
          <div class="selected_engineer">
            <label style="margin-bottom:2%;">選択科目</label>
            <div class="">
              @foreach($subjects as $subject)
                <label>{{ $subject->subject }}</label>
                <input type="checkbox" name="subject[]" form="userSearchRequest" value="{{ $subject->id }}">
              @endforeach
            </div>
          </div>
        </div>
      </div>
      <div>
        <input type="submit" name="search_btn" value="検索" form="userSearchRequest" class="search_btn">
      </div>
      <div>
        <input type="reset" value="リセット" form="userSearchRequest" class="reset_btn">
      </div>
    </div>
    <form action="{{ route('user.show') }}" method="get" id="userSearchRequest"></form>
  </div>
</div>
@endsection
