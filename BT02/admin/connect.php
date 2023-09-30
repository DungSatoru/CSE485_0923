<?php
$strConnection = mysqli_connect('localhost', 'root', 'HaDung18092003', 'CMS');
if (!$strConnection) {
  die('Can not connect');
}
mysqli_set_charset($strConnection, 'utf8');
