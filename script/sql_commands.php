<!--
        Rhys Gillham
        M133320
        This is the sql commands that can be called depending on what is required, any additional commands should be placed here.
-->
<?php

class sql_commands
{
    public static function returnQuery($target, $conn) //hand all/style/artist values back.
    {

        switch ($target)
        {
            case "style":

                $sqlStyles = "SELECT style FROM paintings ORDER BY style";

                $sqlResults = $conn->prepare($sqlStyles);
                $sqlResults->execute();

                $returnArr = array();
                $data = $sqlResults->fetchAll(PDO::FETCH_ASSOC);


                foreach ($data as $value)
                {
                    $item = $value['style'];
                    if (!in_array($item, $returnArr))
                    {
                        $returnArr[] = $item;
                    }
                }
                return $returnArr;

            case "artist":

                $sqlStyles = "SELECT DISTINCT artistName FROM artists ORDER BY artistName";

                $sqlResults = $conn->prepare($sqlStyles);
                $sqlResults->execute();

                $returnArr = array();
                $data = $sqlResults->fetchAll(PDO::FETCH_ASSOC);


                foreach ($data as $value)
                {
                    $item = $value['artistName'];
                    //Failsafe - Will leave UNKNOWN ARTIST off the list
                    if ($item != 'UNKNOWN ARTIST')
                    {
                        $returnArr[] = $item;
                    }
                }
                return $returnArr;

            case "browse":

                $sqlImages = "SELECT * FROM paintings";

                $stmtImages = $conn->prepare($sqlImages);
                $stmtImages->execute();

                $returnArr = $stmtImages->fetch(PDO::FETCH_BOTH);

                return $returnArr;

            case "artStyle":

                //selects artists by style from the database and orders them alphabetically
                $sqlStyles = "SELECT DISTINCT style FROM artists ORDER BY style";
                $sqlResults = $conn->prepare($sqlStyles);
                $sqlResults->execute();
                    
                $returnArr = array();
                $data = $sqlResults->fetchAll(PDO::FETCH_ASSOC);

                foreach($data as $value)
                {
                    $item = $value['style'];

                    if($item != "UNKNOWN STYLE")
                    {

                        $returnArr[]= $item;
                    }
                }
                return $returnArr;


            //change to art medium once I figure out how to implement it
            case "artLife":
                $sqlStyles = "SELECT DISTINCT lifeSpan FROM artists ORDER BY lifeSpan";
                $sqlResults = $conn->prepare($sqlStyles);
                $sqlResults->execute();

                $returnArr = array();
                $data = $sqlResults->fetchAll(PDO::FETCH_ASSOC);

                foreach($data as $value)
                {
                    $item = $value['lifeSpan'];

                    if($item != 'UNKNOWN LIFESPAN')
                    {
                        $returnArr[] = $item;
                    }
                }
                return $returnArr;
        }
    }

    public static function Delete($id, $conn)
    {
        $sqlQuery = "DELETE FROM paintings WHERE id='" . $id . "'";
        $sqlResults = $conn->prepare($sqlQuery);
        $sqlResults->execute();
    }
}
