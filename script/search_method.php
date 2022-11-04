<!--
        Rhys Gillham
        M133320

        Takes in the original form along with a decision of what table it is to be searched and then populates and executes a new form based on that selection.
-->

<?php
$type;
$search;

//Takes in the type of radio button that has been selected through the value='' on the form
if (isset($_POST['flexRadioSearch']))
{
    $type = $_POST['flexRadioSearch'];
}
//The term that is posted
if (isset($_POST['search']))
{
    $search = $_POST['search'];
}

//Switches between types to give the correct page to load
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

        <form class="d-flex searchSizing" action="../pages/ArtistFiltered.php" method="post" id="form">
            <input readonly class="form-control" placeholder="Search" type="search" name="search" value="<?php echo $search ?>">
        </form>
        <script type="text/javascript">
            document.getElementById('form').submit();
        </script>

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
