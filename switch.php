<?php

@$action=$_GET['action'];

switch ($action) {
    case 2020:include("vue.php");
      break;
      case 2021:
        echo "2021";
      break;
      case 2022:
        echo "2022";
      break;
    default:
        include("vue.php");
  }

?>