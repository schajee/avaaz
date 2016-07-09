<?php
  function pinfo() {
    ob_start();
    phpinfo();
    $data = ob_get_contents();
    ob_clean();
    return $data;
  }
