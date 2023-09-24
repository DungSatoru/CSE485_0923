<?php
$strConnection = mysqli_connect('localhost', 'root', 'HaDung18092003', 'btth01_cse485');
if (!$strConnection)
  die('Can not connection');
mysqli_set_charset($strConnection, 'utf8');
