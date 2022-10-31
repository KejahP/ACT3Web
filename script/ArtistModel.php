<!--
        Kejah Pulman
        30034444

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

    //sets all table data
    public function __construct( $artistID,  $artistName, $imageFile, $style, $lifeSpan)
    {
      $this->artistID = $artistID;
      $this->artistName = $artistName;
      $this->imageFile = $imageFile;
      $this->style = $style;
      $this->lifeSpan = $lifeSpan;
    }

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

    //for create new follow the script/create method.php
    public function createNew()
    {
        
    }

}

?>