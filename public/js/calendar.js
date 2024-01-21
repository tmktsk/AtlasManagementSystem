// $(function () {
//   $(document).ready(function () {
//     $('[name="delete_date"]').click(function () {
//       $('#deleteModal').modal('show');
//     });
//   });

// });

$(function () {
  // 削除ボタン(class="js-modal-open")が押されたら発火
  $('.js-modal-open').on('click', function () {
    // モーダルの中身(class="js-modal")の表示
    $('.js-modal').fadeIn();
    var setting_reserve = $(this).val();
    var setting_part = $(this).text();

    $('.modal-inner-delete .date').text(setting_reserve);
    $('.modal-inner-delete .place').text(setting_part);
    return false;

  });
});

// $(function () { // if document is ready
//   alert('hello world')
// });
