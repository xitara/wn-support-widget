<?php

return [
    'plugin' => [
        'name' => 'サポートウィジェット',
        'description' => 'ダッシュボードにサポート情報を表示します。',
    ],
    'permissions' => [
        'show_widget' => 'ウィジェットを表示する',
    ],
    'widget' => [
        'label' => 'サポートウィジェット',
        'support_text' => '当社のサポートに連絡する方法',
        'phone' => '電話',
        'email' => 'メール',
        'home' => 'Webサイト',
    ],
];
