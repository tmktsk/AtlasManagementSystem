@extends('layouts.sidebar')

@section('content')
<div class="board_area w-100 border m-auto d-flex">
  <div class="post_view w-75 mt-5">
    <p class="w-75 m-auto">投稿一覧</p>
    @if(!empty($posts))
      @foreach($posts as $post)
        <div class="post_area border w-75 m-auto p-3">
          <p><span>{{ $post->user->over_name }}</span><span class="ml-3">{{ $post->user->under_name }}</span>さん</p>
          <p><a href="{{ route('post.detail', ['id' => $post->id]) }}">{{ $post->post_title }}</a></p>
          <div class="post_bottom_area d-flex">
            <div class="d-flex post_status">
                <div class="post-category">
                  <span class="post-subcategory">{{ $post->subCategories->first()->sub_category }}</span>
                </div>
              <div class="subjects">
                @if($post->user->subjects->isNotEmpty())
                  @foreach($post->user->subjects as $subject)
                    <span class="category_btn">{{ $subject->subject }}</span>
                  @endforeach
                @endif
              </div>
              <div class="d-flex" style="margin-left: auto;">
                <div class="mr-5">
                  <i class="fa fa-comment"></i>
                    <span class="">
                      {{ $post->postComments->count() }}
                    </span>
                </div>
                <div>
                  @if(Auth::user()->is_Like($post->id))
                  <p class="m-0"><i class="fas fa-heart un_like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}">{{ $like->likeCounts($post->id) }}</span></p>
                  @else
                    <p class="m-0"><i class="fas fa-heart like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}">{{ $like->likeCounts($post->id) }}</span></p>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    @endif
  </div>
  <div class="other_area border w-25">
    <div class="border m-4">
      <div class="post"><a href="{{ route('post.input') }}">投稿</a></div>
      <div class="search-form">
        <input type="text" placeholder="キーワードを検索" name="keyword" form="postSearchRequest" class="keyword-form">
        <input type="submit" value="検索" form="postSearchRequest" class="search">
      </div>
      <div class="posts">
        <input type="submit" name="like_posts" class="like_posts" value="いいねした投稿" form="postSearchRequest">
        <input type="submit" name="my_posts" class="my_posts" value="自分の投稿" form="postSearchRequest">
      </div>
      <div class="category-search" style="margin-top: 1em;">
        <p>カテゴリー検索</p>
      </div>
      @foreach($categories as $category)
        <ul class="main_categories" category_id="{{ $category->id }}">
          <li>
            <div class="toggle-container">
              <span class="toggle-main-category">{{ $category->main_category }}</span>
              <span class="toggle-icon">V</span>
            </div>
            @foreach($category->subCategories as $subcategory)
              <ul class="sub_categories" category_id="{{ $subcategory->id }}">
                <li>
                  <button type="submit" name="category_word" class="sub_category_btn" form="postSearchRequest">{{ $subcategory->sub_category }}</button>
                </li>
              </ul>
            @endforeach
          </li>
        </ul>
      @endforeach
    </div>
  </div>
  <form action="{{ route('post.show') }}" method="get" id="postSearchRequest"></form>
</div>
@endsection
