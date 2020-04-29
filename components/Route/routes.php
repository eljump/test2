<?php
return array(
    'auth' => 'auth/logpage',
    'registration' => 'registration/regpage',
    'news/([0-9]+)' => 'news/item',
    'news/create\?' => 'news/set',
    'news/create' => 'news/create',
    'news' => 'news/index',
    '' => 'mainpage/index'
);