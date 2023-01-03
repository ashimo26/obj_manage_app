<?php

/*
livewire
composer require livewire/livewire

headタグ内に @livewireStyles を書き込む
bodyタグ内に @livewireScripts を書き込む
@livewire('birthday') 表示させたい場所に
https://qiita.com/nakasan773/items/75b06af0686e4e35d57f
より参照
*/

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;

class Birthday extends Component
{
        // 変数をビューで使えるようにここで定義
        public $year = 0;
        public $month = 0;
        public $day = 0;
        public $age = -1;
        public $last_day_of_month = 0;
    
        // 定義したら実行
        public function mount($year = 0, $month = 0, $day = 0) {
    
            $this->year = $year;
            $this->month = $month;
            $this->day = $day;
            $this->onChange();
    
        }
    
        // 入力ボックスに変更のある度に呼ばれる
        public function onChange()
        {
            $year = intval($this->year);
            $month = intval($this->month);
            $day = intval($this->day);

            // 該当月の日を計算（28〜31日）
            if($year > 0 && $month > 0) {

                $this->last_day_of_month = Carbon::create($this->year, $this->month)->endOfMonth()->day;

            }

            // 年齢を計算
            if(checkdate($month, $day, $year)) {

                $this->age = Carbon::createFromDate($this->year, $this->month, $this->day)->age;

            } else {

                $this->age = -1;

            }
        }

    public function render()
    {
        return view('livewire.birthday');
    }
}
