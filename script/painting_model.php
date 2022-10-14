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
}
