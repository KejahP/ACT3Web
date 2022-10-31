<?php
$type;
$search;

if (isset($_POST['flexRadioSearch']))
{
    $type = $_POST['flexRadioSearch'];
}
if (isset($_POST['search']))
{
    $search = $_POST['search'];
}


switch ($type)
{
    case "painting":
?>
        <!DOCTYPE html>
        <html lang="en">

        <form class="d-flex searchSizing" action="../pages/painting_filtered.php" method="post" id="form">
            <input readonly class="form-control" placeholder="Search" type="search" name="search" value="<?php echo $search ?>">
        </form>
        <script type="text/javascript">
            document.getElementById('form').submit();
        </script>

        </html>
    <?php
        break;

    case "artist":
    ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta http-equiv="Refresh" content="0; ../pages/ArtistTable.php">
        </head>

        <body>
            <a href="../pages/painting_filtered.php">Click here to redirect</a>
        </body>

        </html>
    <?php
        break;

    default:
    ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta http-equiv="Refresh" content="0; ../pages/painting_table.php">
        </head>

        <body>
            <a href="./pages/index.php">Click here to redirect</a>
        </body>

        </html>
<?php
        break;
}
