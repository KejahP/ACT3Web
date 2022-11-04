<html>

<body>
  <?php

  $search = $_POST["search"];
  echo "Welcome $search <br>";

  $control = "Test_Artist";

  if ($search == $control) {
    echo "<p>$search matches control</p>";
  } else echo "<p>$search doesn't match $control!</p>";
  ?>
</body>

</html>