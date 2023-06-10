<?php

return $render_flash = function ($value) {
    global $render_flash;
    if (is_array($value)) {
        echo "<ul>";
        foreach ($value as $index => $item) {
            echo $index;
            $render_flash($item);
        }
        echo "</ul>";
    } else {
        echo "<li class='alert alert-danger'>FLASH : VALUE:=> $value</li>";
    }

};