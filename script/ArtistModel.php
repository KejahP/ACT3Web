<!--
        Kejah Pulman
        30034444

        Andrew-kyuuun~
        P271838

        This is the model for an artist, it ensures that all data is properly displayed within the tables
-->

<?php
class artist
{
    public $artistID;
    public $artistName;
    public $imageFile;
    public $style;
    public $lifeSpan;

    // Default Constructor for artist
    public function __construct( $artistID,  $artistName, $imageFile, $style, $lifeSpan)
    {
      $this->artistID = $artistID;
      $this->artistName = $artistName;
      $this->imageFile = $imageFile;
      $this->style = $style;
      $this->lifeSpan = $lifeSpan;
    }

    // Overloaded Constructor for artist from table row * not sure about 
    public static function ArtRow($row)
    {
      $newArtist = new static
      (
        $row['artistID'],
        $row['artistName'],
        $row['imageFile'],
        $row['style'],
        $row['lifeSpan']
      );
      
      return $newArtist;
    }

    // Create Image Html Element from artists imageFile
    function createImage($height, $width)
  {
    return '<img src = "data:image/png;base64,' . base64_encode($this->imageFile) . '" width = "' . $width . '" height = "' . $height . '"/>';
  }

    // Andrew Masar P271838
    // Return FormGroup for editing artists
    function EditArtist()
    {// /script/testMethod.php is currently the edit method for painting model
      echo "<form class='row g-3' action='../script/EditArtist.php' method='post' target='_self' enctype='multipart/form-data'> 
      <table class='table'>
          <thead>
            <th scope=\"col\"></th>
            <th scope=\"col\"></th>
            <th scope=\"col\"></th>
          </thead>

          <input type='hidden' id='aid' name='aid' value='$this->artistID'>
          
          <tr>
            <td>
              <h6>$this->artistName</h6>
            </td>
            <td>
              <input class='form-control' type='text' placeholder='Name' id='aname' name='aname' value='$this->artistName'>
            </td>
          </tr>

          <tr>
            <td>" .
              $this->createImage('300px', '300px') .
            "</td>
          </tr>

          <tr>
            <td> 
              $this->lifeSpan
            </td>
            <td>
              <input class='form-control' type='text' placeholder='LifeSpan' id='alifespan' name='plifespan' value='$this->lifeSpan'>
            </td>
          </tr>


            <td> 
              $this->style 
            </td>
            <td>
              <input class='form-control' type='text' placeholder='Style' id='astyle' name='pstyle' value='$this->style'>
            </td>
          </tr>
        </table>
        <input class='btn' type='submit'>
    </form>";
    }

    // Andrew Masar P271838
    // Return FormGroup for Creating New Artists
    function CreateArtist()
    {// /script/testMethod.php is currently the edit method for painting model
      echo "<form class='row g-3' action='../script/CreateArtist.php' method='post' target='_self' enctype='multipart/form-data'> 
              <table class='table'>
                  <thead>
                    <th scope=\"col\"></th>
                  </thead>
                  <tr>
                    <td>
                      <input class='form-control' type='text' placeholder='Artist Name' id='aname' name='aname'>
                      <input hidden class='form-control' type='text' id='create' name='create' value='create'>
                    </td>
                  </tr>

                  <tr>
                  <td>
                      <label for='aimage'>Upload New Image:</label>
                      <input type='file' id='aimage' name='aimage'>
                    </td>
                  </tr>

                  <tr>
                    <td>
                      <input class='form-control' type='text' placeholder='Life Span' id='alifespan' name='alifespan'  >
                    </td>
                  </tr>

                  <tr>
                    <td>
                      <input class='form-control' type='text' placeholder='Style' id='astyle' name='astyle'>
                    </td>
                  </tr>
                </table>
                
              <input class='btn' type='submit'>

          </form>";
    }

}

?>