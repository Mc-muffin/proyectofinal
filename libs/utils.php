<?php

function getPostWithDefault($value, $default='')
{
    if (isset($_POST[$value])) {
        return $_POST[$value];
    } else {
        return $default;
    }
}