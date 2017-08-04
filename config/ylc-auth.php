<?php

return [

    'host' => env('YLC_OPENID_HOST', config('app.url')),
    'identity' => env('YLC_OPENID_IDENTITY', 'http://openid.ylc.edu.tw'),

    'fields' => [

        'name',       // 姓名
        'email',      // 電子郵件
        'schoolid',   // 學校代碼
        'schooltown', // 單位鄉鎮市
        'schoolname', // 單位名稱
        'schooltype', // 單位別
        'usertype',   // 身份別
        'userjob',    // 行政職務

    ],

];
