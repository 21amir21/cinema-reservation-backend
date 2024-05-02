<?php

/**
 * a function to validate any passed data, most probably insert into a form
 *  
 */

function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}
