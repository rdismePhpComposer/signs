# sign class


```
<?php

require_once '../vendor/autoload.php';

use Rdisme\Signs\Sign;

$conf = array(
    'secret' => '1EHvT6lXgLS9C9Dr'
);

$s = new Sign($conf);

$data = array(
    'a' => 22,
    'b' => 33,
    'd' => 11,
    'c' => 55
);

// sign create
$sign = $s->create($data);
var_dump($sign);

// sign check
if ($s->check($data, $sign)) {
    echo 'ok';
} else {
    echo 'no';
}

```