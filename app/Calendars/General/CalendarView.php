<?php
namespace App\Calendars\General;

use Carbon\Carbon;
use Auth;

class CalendarView{

  private $carbon;
  function __construct($date){
    $this->carbon = new Carbon($date);
  }

  public function getTitle(){
    return $this->carbon->format('Y年n月');
  }

  function render(){
    $html = [];
    $html[] = '<div class="calendar text-center">';
    $html[] = '<table class="table">';
    $html[] = '<thead>';
    $html[] = '<tr>';
    $html[] = '<th>月</th>';
    $html[] = '<th>火</th>';
    $html[] = '<th>水</th>';
    $html[] = '<th>木</th>';
    $html[] = '<th>金</th>';
    $html[] = '<th style="color:#0000FF;">土</th>';
    $html[] = '<th style="color:#FF0000;">日</th>';
    $html[] = '</tr>';
    $html[] = '</thead>';
    $html[] = '<tbody>';
    $weeks = $this->getWeeks();
    foreach($weeks as $week){
      $html[] = '<tr class="'.$week->getClassName().'">'; //曜日を取得

      $days = $week->getDays();
      foreach($days as $day){
        $startDay = $this->carbon->copy()->format("Y-m-01");
        $toDay = $this->carbon->copy()->format("Y-m-d"); //今日の日付を取得

        if($startDay <= $day->everyDay() && $toDay >= $day->everyDay()){ //$day->everydayが$startDayと$toDayの範囲内であれば
          $html[] = '<td class="calendar-td '.$day->getClassName().'" style="background-color: #EEEEEE">'; //今日以前の日にち
        }else{
          $html[] = '<td class="calendar-td '.$day->getClassName().'">'; //今日以降の日にち
        }
        $html[] = $day->render();

        if(in_array($day->everyDay(), $day->authReserveDay())){ //予約されていれば？？
          $reservePart = $day->authReserveDate($day->everyDay())->first()->setting_part;
          $html[] = '<input type="hidden" name="getPart[]" value="" form="reserveParts">';
          if($reservePart == 1){
            $reservePart = "リモ1部"; //予約後の部数表示
          }else if($reservePart == 2){
            $reservePart = "リモ2部"; //予約後の部数表示
          }else if($reservePart == 3){
            $reservePart = "リモ3部"; //予約後の部数表示
          }
          if($startDay <= $day->everyDay() && $toDay >= $day->everyDay()){ //過去の日付であれば
            $html[] = '<p class="m-auto p-0 w-75" style="font-size:12px">'.$reservePart.'</p>';
            // $html[] = '<input type="hidden" name="getPart[]" value="'.$reservePart.'" form="reserveParts">';
          }else{                       //未来の日付であれば
            $html[] = '<button type="submit" class="btn btn-danger p-0 w-75 js-modal-open" name="delete_date" style="font-size:12px" value="'. $day->authReserveDate($day->everyDay())->first()->setting_reserve .'">'. $reservePart .'</button>';
            // $html[] = '<input type="hidden" class="data-date" value="'. $day->getDate() .'">';
            // dd($day);
            // $html[] = '<input type="hidden" class="reserve-part" value="'. $reservePart .'">';
          }
        }else if($startDay <= $day->everyDay() && $toDay >= $day->everyDay()){   //予約していない & 過去の日付
          $html[] = '<span style="color: black;">受付終了</span>';
          $html[] = '<input type="hidden" name="getPart[]" value="" form="reserveParts">';
        }else {                      //予約をしていない場合
            $html[] = $day->selectPart($day->everyDay());
        }
        $html[] = $day->getDate();
        $html[] = '</td>';
      }
      $html[] = '</tr>';
    }
    $html[] = '</tbody>';
    $html[] = '</table>';
    $html[] = '</div>';
    $html[] = '<form action="/reserve/calendar" method="post" id="reserveParts">'.csrf_field().'</form>';
    $html[] = '<form action="/delete/calendar" method="post" id="deleteParts">'.csrf_field().'</form>';

    return implode('', $html);
  }


  protected function getWeeks(){
    $weeks = [];
    $firstDay = $this->carbon->copy()->firstOfMonth(); //月初めの日時をコピー
    $lastDay = $this->carbon->copy()->lastOfMonth();
    $week = new CalendarWeek($firstDay->copy());
    $weeks[] = $week;
    $tmpDay = $firstDay->copy()->addDay(7)->startOfWeek();
    while($tmpDay->lte($lastDay)){
      $week = new CalendarWeek($tmpDay, count($weeks));
      $weeks[] = $week;
      $tmpDay->addDay(7);
    }
    return $weeks;
  }

}
?>
