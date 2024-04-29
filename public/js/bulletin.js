// $('.main_categories').click(function () {
//   var category_id = $(this).attr('category_id');
//   $('.category_num' + category_id).slideToggle();
// });

//投稿一覧ページ
$(function () {
  $('.toggle-main-category').click(function () {
    var category_id = $(this).closest('.main_categories').attr('category_id');
    // $('.sub_categories[category_id="' + category_id + '"]').slideToggle();
    $('.main_categories[category_id="' + category_id + '"] .sub_categories').slideToggle();
  });
});

document.addEventListener('DOMContentLoaded', function () {
  const toggleMainCategory = document.querySelector('.toggle-main-category');

  toggleMainCategory.addEventListener('click', function () {
    const icon = toggleMainCategory.nextElementSibling;
    icon.classList.toggle('rotated');
  });
});

// $(function () {
//   $('.toggle-search-conditions').click(function () {
//     var category_id = $(this).closest('.main_categories').attr('category_id');
//     // $('.sub_categories[category_id="' + category_id + '"]').slideToggle();
//     $('.main_categories[category_id="' + category_id + '"] .sub_categories').slideToggle();
//   });
// });

//ユーザー検索ページ
document.addEventListener('DOMContentLoaded', function () {
  const toggleSearchConditions = document.querySelector('.toggle-search-conditions');

  toggleSearchConditions.addEventListener('click', function () {
    const icon = toggleSearchConditions.nextElementSibling;
    icon.classList.toggle('rotated');
  });
});

//プロフィールページ
document.addEventListener('DOMContentLoaded', function () {
  const subjectEditBtn = document.querySelector('.subject_edit_btn');

  subjectEditBtn.addEventListener('click', function () {
    const icon = subjectEditBtn.nextElementSibling;
    icon.classList.toggle('rotated');
  });
});


$(document).on('click', '.like_btn', function (e) {
  e.preventDefault();
  $(this).addClass('un_like_btn');
  $(this).removeClass('like_btn');
  var post_id = $(this).attr('post_id');
  var count = $('.like_counts' + post_id).text();
  var countInt = Number(count);
  $.ajax({
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    method: "post",
    url: "/like/post/" + post_id,
    data: {
      post_id: $(this).attr('post_id'),
    },
  }).done(function (res) {
    console.log(res);
    $('.like_counts' + post_id).text(countInt + 1);
  }).fail(function (res) {
    console.log('fail');
  });
});

$(document).on('click', '.un_like_btn', function (e) {
  e.preventDefault();
  $(this).removeClass('un_like_btn');
  $(this).addClass('like_btn');
  var post_id = $(this).attr('post_id');
  var count = $('.like_counts' + post_id).text();
  var countInt = Number(count);

  $.ajax({
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    method: "post",
    url: "/unlike/post/" + post_id,
    data: {
      post_id: $(this).attr('post_id'),
    },
  }).done(function (res) {
    $('.like_counts' + post_id).text(countInt - 1);
  }).fail(function () {

  });
});

$('.edit-modal-open').on('click', function () {
  $('.js-modal').fadeIn();
  var post_title = $(this).attr('post_title');
  var post_body = $(this).attr('post_body');
  var post_id = $(this).attr('post_id');
  $('.modal-inner-title input').val(post_title);
  $('.modal-inner-body textarea').text(post_body);
  $('.edit-modal-hidden').val(post_id);
  return false;
});
$('.js-modal-close').on('click', function () {
  $('.js-modal').fadeOut();
  return false;
});
