<?php

function returnQuery($target, $conn) //hand all/style/artist values back.
{

    switch ($target) {
        case "style":

            $sqlStyles = "SELECT style FROM paintings ORDER BY style";

            $sqlResults = $conn->prepare($sqlStyles);
            $sqlResults->execute();

            $returnArr = array();
            $data = $sqlResults->fetchAll(PDO::FETCH_ASSOC);


            foreach ($data as $value) {
                $item = $value['style'];
                if (!in_array($item, $returnArr)) {
                    $returnArr[] = $item;
                } 
            }
            return $returnArr;

        case "artist":

            $sqlStyles = "SELECT artist FROM paintings ORDER BY artist";

            $sqlResults = $conn->prepare($sqlStyles);
            $sqlResults->execute();

            $returnArr = array();
            $data = $sqlResults->fetchAll(PDO::FETCH_ASSOC);


            foreach ($data as $value) {
                $item = $value['artist'];
                if (!in_array($item, $returnArr)) {
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
    }
}

function returnAll()
{
}
