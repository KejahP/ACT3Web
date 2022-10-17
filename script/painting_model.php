<!--
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
    $newPainting = new static($row['id'], $row['name'], $row['imagefile'], $row['year'], $row['artist'], $row['medium'], $row['style']);
    return $newPainting;
  }

  //Return Image as HTML Element
  function createImage($height, $width)
  {
    return '<img src = "data:image/png;base64,' . base64_encode($this->image) . '" width = "' . $width . '" height = "' . $height . '"/>';
  }

  function FormGroup()
  {
    echo "
    <form class='row g-3' action='/ACT3Web/script/testMethod.php' method='post'>
    <table class='table'>
        <thead>
          <th scope=\"col\"></th>
          <th scope=\"col\"></th>
          <th scope=\"col\"></th>
        </thead>

        <input type='text' class='visually-hidden' id='pid' value='$this->id'>
        <tr>
          <td>
            <h6>$this->name</h6>
          </td>
          <td>
            <input class='form-control' type='text' placeholder='Name' id='pname' value='$this->name'>
          </td>
        </tr>

        <tr><td>".
            $this->createImage('300px', '300px').
        "</td></tr>

        <tr>
          <td> $this->year </td>
          <td>
            <input class='form-control' type='number' id='pyear' min='0000' max='2100' placeholder='1500' value='$this->year'>
          </td>
        </tr>
        <tr>
          <td> 
            $this->artist 
          </td>
          <td>
            <input class='form-control' type='text' placeholder='Artist' id='partist' value='$this->artist'>
          </td>
        </tr>
        <tr>
          <td> $this->medium </td>
          <td>
            <input class='form-control' type='text' placeholder='Medium' id='pmedium' value='$this->medium'>
          </td>
        </tr>
        <tr>
          <td> $this->style </td>
          <td>
            <input class='form-control' type='text' placeholder='Style' id='pstyle' value='$this->style'>
          </td>
        </tr>
        </table>
        <input class='btn' type='submit'>
    </form>";
      
    
  }
}
