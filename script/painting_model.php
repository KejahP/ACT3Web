<!--
        Andrew Masar
        P271838

        Rhys Gillham
        M133320

        This is the model for a painting, it ensures that all values are correct before allowing to be displayed.
-->

<?php
// Model For Painting Class
class painting
{
  public $id;
  public $name;
  public $image;
  public $year;
  public $artist;
  public $medium;
  public $style;


  public function __construct($id, $name, $image, $year, $artist, $medium, $style)
  {
    $this->id = $id;
    $this->name = $name;
    $this->image = $image;
    $this->year = $year;
    $this->artist = $artist;
    $this->medium = $medium;
    $this->style = $style;
  }

  // Overloaded Constructor OR static constructor, work around for limitation of only having one constructor per class
  public static function FromRow($row)
  {
    $newPainting = new static($row['id'], $row['name'], $row['imageFile'], $row['year'], $row['artistName'], $row['medium'], $row['style']);
    return $newPainting;
  }

  //Return Image as HTML Element
  function createImage($height, $width)
  {
    return '<img src = "data:image/png;base64,' . base64_encode($this->image) . '" width = "' . $width . '" height = "' . $height . '"/>';
  }

  //Returns the update webpage for the painting model along.
  function FormGroup($conn)
  {
    $artists = sql_commands::returnQuery("artistName", $conn);

    echo "<form class='row g-3' action='../script/testMethod.php' method='post' target='_self' enctype='multipart/form-data'>
      <table class='table'>
          <thead>
            <th scope=\"col\"></th>
            <th scope=\"col\"></th>
            <th scope=\"col\"></th>
          </thead>

          <input type='hidden' id='pid' name='pid' value='$this->id'>
          
          <tr>
            <td>
              <h6>$this->name</h6>
            </td>
            <td>
              <input class='form-control' type='text' placeholder='Name' id='pname' name='pname' value='$this->name'>
            </td>
          </tr>

          <tr>
            <td>" .
      $this->createImage('300px', '300px') .
      "</td>
          </tr>

          <tr>
            <td> 
              $this->year 
            </td>
            <td>
              <input class='form-control' type='number' id='pyear' name='pyear' min='0000' max='2100' placeholder='1500' value='$this->year'>
            </td>
          </tr>
          <tr>
            <td> 
              $this->artist 
            </td>
            <td>
            <div>
                <input list='artistID' id='partist' name='partist' placeholder='Artist Name' required>
                <datalist id='artistID'>
                ";
    foreach ($artists as $data) //Iterates through the available artists to give the users the ability to select an artist that exists within the database.
    {
      echo "<option value='" . $data[0] . "'>" . $data[1] . "</option>";
    }
    echo "
                  </datalist>
            </div>
            </td>
          </tr>
          <tr>
            <td> $this->medium </td>
            <td>
              <input class='form-control' type='text' placeholder='Medium' id='pmedium' name='pmedium' value='$this->medium'>
            </td>
          </tr>
          <tr>
            <td> 
              $this->style 
            </td>
            <td>
              <input class='form-control' type='text' placeholder='Style' id='pstyle' name='pstyle' value='$this->style'>
            </td>
          </tr>
        </table>
        <input class='btn' type='submit'>
    </form>";
  }

  //Returns the new webpage for a new entry into the paintings.
  public static function CreateNew($conn)
  {
    $artists = sql_commands::returnQuery("artistName", $conn);
    echo "
    <form class='row g-3' action='" . dirname($_SERVER['PHP_SELF'], 2) .
      "/script/createMethod.php' method='post' target='_self' enctype='multipart/form-data'>
      <table class='table'>
          <thead>
            <th scope=\"col\"></th>
          </thead>
          <tr>
            <td>
              <input class='form-control' type='text' placeholder='Name' id='pname' name='pname'>
              <input hidden class='form-control' type='text' id='create' name='create' value='create'>
            </td>
          </tr>

          <tr>
          <td>
              <label for='pimage'>Upload New Image:</label>
              <input type='file' id='pimage' name='pimage'>
            </td>
          </tr>

          <tr>
            <td>
              <input class='form-control' type='number' id='pyear' name='pyear' min='0000' max='2100' placeholder='1500' >
            </td>
          </tr>
          <tr>
            <td>
              <div>
                <input list='artistID' id='partist' name='partist' placeholder='Artist Name' required>
                <datalist id='artistID'>
                ";
    foreach ($artists as $data) //Iterates through the available artists to give the users the ability to select an artist that exists within the database.
    {
      echo "<option value='" . $data[0] . "'>" . $data[1] . "</option>";
    }
    echo "
                  </datalist>
            </div>
            </td>
          </tr>
          <tr>
            <td>
              <input class='form-control' type='text' placeholder='Medium' id='pmedium' name='pmedium'>
            </td>
          </tr>
          <tr>
            <td>
              <input class='form-control' type='text' placeholder='Style' id='pstyle' name='pstyle'>
            </td>
          </tr>
        </table>
        <input class='btn' type='submit'>
    </form>";
  }
}
