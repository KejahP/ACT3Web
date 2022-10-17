<?php
  include_once(dirname(__DIR__) . '/script/connection.php');
  //$this->name = $_POST['pname'];

  $sqlQuery = "UPDATE paintings SET name=?, image=?, year=?, artist=?, medium=?, style=? WHERE id=?"; //change paintings to db name
  //$sqlQuery = "UPDATE paintings SET name=".$_POST['pname'].", image=".$_POST['pimage'].", year=".$_POST['pyear'].", artist=".$_POST['partist'].", medium=".$_POST['pmedium'].", style=".$_POST['pstyle']." WHERE id=".$_POST['pid'].""; //change paintings to db name
  $stmt= $conn->prepare($sqlQuery);
  $stmt->execute($_POST['pname'], $_POST['pimage'], $_POST['pyear'], $_POST['partist'], $_POST['pmedium'], $_POST['pstyle'], $_POST['pid']);
  echo "successful";