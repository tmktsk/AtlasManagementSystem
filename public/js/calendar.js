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
    var setting_part_number = setting_part.match(/\d+/)[0];

    $('.modal-inner-delete .date').text(setting_reserve);
    $('.modal-inner-delete .time').text(setting_part);

    $('.modal-inner-delete input.date').val(setting_reserve);
    $('.modal-inner-delete input.time').val(setting_part_number);

    return false;

  });
});

// $('.js-modal-open').click(function () {
//   var date = $(this).val(); // ボタンの値（日付情報）を取得
//   var part = $(this).data('part'); // ボタンのデータ属性から部分情報を取得
//   $('#deleteParts').append('<input type="hidden" name="getDate[]" value="' + date + '">'); // 日付情報を追加
//   $('#deleteParts').append('<input type="hidden" name="getPart[]" value="' + part + '">'); // 部分情報を追加
// });

// $(function () { // if document is ready
//   alert('hello world')
// });
