$(function () {
  $('.search_conditions').click(function () {
    $('.search_conditions_inner').slideToggle();
    const icon = document.querySelector('.toggle-icon');
    icon.classList.toggle('rotated');
  });

  $('.subject_edit_btn').click(function () {
    $('.subject_inner').slideToggle();
  });
});

//ユーザー検索ページ
// document.addEventListener('DOMContentLoaded', function () {
//   const toggleSearchConditions = document.querySelector('.toggle-search-conditions');

//   toggleSearchConditions.addEventListener('click', function () {
//     const icon = toggleSearchConditions.nextElementSibling;
//     icon.classList.toggle('rotated');
//   });
// });

// $(function () {
//   alert('hello world');
// });

document.addEventListener('DOMContentLoaded', function () {
  var deleteButtons = document.querySelectorAll('.delete-post');

  deleteButtons.forEach(function (button) {
    button.addEventListener('click', function (event) {
      event.preventDefault();

      var postId = button.getAttribute('data-post-id');
      var confirmation = confirm('本当に削除しますか？');

      if (confirmation) {
        // OKがクリックされた場合、削除リンクに遷移
        window.location.href = button.href;
      } else {
        // キャンセルがクリックされた場合、何もしない
      }
    });
  });
});
