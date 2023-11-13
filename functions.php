<?php

function dd($value)
{
    echo "<pre id=dd>";
    var_dump($value);
    echo "</pre>";
    die();
}
