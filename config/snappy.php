<?php

return array(


    'pdf' => array(
        'enabled'   => true,
        // 'binary'    => env('WKHTMLTO', '/usr/local/bin/wkhtmltopdf'),
        'binary'    => base_path('/vendor/wemersonjanuario/wkhtmltopdf-windows/bin/64bit/wkhtmltopdf'),
        'encoding'  => 'UTF-8',
        'timeout'   => false,
        'options'   => array(
            'margin-right'  => 15,
            'margin-bottom' => 25,
            'margin-left'   => 15,
            'enable-local-file-access' => true
        ),
        'no-outline'
    ),
    'image' => array(
        'enabled' => true,
        'binary' => '/home/wkhtmltox/bin/wkhtmltoimage',
        'timeout' => false,
        'options' => array(),
    ),


);
