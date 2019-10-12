<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return view('home');
    }

    //complement duration
    public function duration() {
        $pattern = [
            (Object)[
                'key' => 'V + 时量补语',
                'example' => [
                    "咱们休息十分钟。",
                    "A：你昨天预习了多长时间？",
                    "B：预习了半个多小时。",
                    "我打算在中国学四年。"
                ]
            ]
        ];
        return view('page.duration', ['pattern' => $pattern]);
    }

    public function direction() {
        $pat = (object) [
            'key' => 'V + 上/下/进/出/回/过 + O （处所 Locality ）+ 来 / 去',
            'example' => [
                "杰克走上楼去了",
                "我们等了很长时间也没接到他的朋友。",
                "我看见了她跑上楼去了。",
                "他跑进教室来了。"
            ]
        ];
        $pattern = [$pat];
        return view('page.direction',['pattern' => $pattern]);
    }
}
