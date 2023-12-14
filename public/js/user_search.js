$(function () {
  $('.search_conditions').click(function () {
    $('.search_conditions_inner').slideToggle();
  });

  $('.subject_edit_btn').click(function () {
    $('.subject_inner').slideToggle();
  });
});

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
