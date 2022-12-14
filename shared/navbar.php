<?php
/*
        Rhys Gillham
        M133320
        Contains the partial render for the header tag, this contains the nav elements to be shared over all pages.
        All includes that are shared over the website are included at this stage.
*/
include_once(dirname(__DIR__) . '/script/connection.php');        //Currently set to connect to xampp using a copy of Andrews initial ConnectionHome.php in resources.
include_once(dirname(__DIR__) . '/script/sql_commands.php');
include_once(dirname(__DIR__) . '/script/painting_model.php');
?>
<header class="">
    <nav class="navStyle row">
        <div class="col p-2">
        </div>
        <div class="col p-2">
            <ul class="d-flex align-items-center justify-content-center">
                <li>
                    <a class="btn" href="index.php">
                        Home
                    </a>
                </li>
                <!--Overall browse options-->
                <li class="dropdown">
                    <button class="btn dropdown-toggle" type="" data-bs-toggle="dropdown">Browse</button>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="painting_table.php">Paintings</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="ArtistTable.php">Artists</a>
                        </li>
                    </ul>
                </li>
                <!--Overall Paintings options-->
                <li class="dropdown">
                    <button class="btn dropdown-toggle" data-bs-toggle="dropdown">Paintings</button>
                    <ul class="dropdown-menu">
                        <!--Style Options-->
                        <li class="dropdown">
                            <label class="" type="text" data-bs-toggle="dropdown">Styles</label>
                            <ul class="dropdown-content">
                                <?php
                                $styles = sql_commands::returnQuery('style', $conn);

                                foreach ($styles as $value)
                                {
                                    echo '  <li class="dropdown-item">
                                                <a class="btn" method="post" href="painting_table.php?style=' . $value . '">
                                                <p>' . $value . '</p>
                                                </a>
                                                </li>';
                                }
                                ?>
                            </ul>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <!--Artist Options-->
                        <label class="" type="text" data-bs-toggle="dropdown">Artists</label>
                        <ul class="dropdown-content">
                            <?php

                            $artists = sql_commands::returnQuery('artist', $conn);

                            foreach ($artists as $value)
                            {
                                echo '  <li class="dropdown-item">
                                    <a class="btn" method="post" href="painting_table.php?artist=' . $value . '">
                                    <p>' . $value . '</p>
                                    </a>
                                    </li>';
                            }
                            ?>
                        </ul>
                    </ul>
                </li>
                <!--Overall Artists options-->
                <li class="dropdown">
                    <button class="btn dropdown-toggle" type="" data-bs-toggle="dropdown">Artists</button>
                    <ul class="dropdown-menu">
                        <li class="dropdown">
                            <!--Style Options-->
                            <label class="" type="text" data-bs-toggle="dropdown">Styles</label>
                            <ul class="dropdown-content">
                                <?php
                                $artStyles = sql_commands::returnQuery('artStyle', $conn);

                                foreach ($artStyles as $value)
                                {
                                    echo '  <li class="dropdown-item">
                                    <a class="btn" method="post" href="ArtistTable.php?artStyles=' . $value . '">
                                    <p>' . $value . '</p>
                                    </a>
                                    </li>';
                                }
                                ?>
                            </ul>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <!--Lifespan Options-->
                        <label class="" type="text" data-bs-toggle="dropdown">Lifespan</label>
                        <ul class="dropdown-content">
                            <?php

                            $artMed = sql_commands::returnQuery('artLife', $conn);
                            foreach ($artMed as $value)
                            {
                                echo '  <li class="dropdown-item">
                                    <a class="btn" method="post" href="ArtistTable.php?artLife=' . $value . '">
                                    <p>' . $value . '</p>
                                    </a>
                                    </li>';
                            }
                            ?>
                        </ul>
                    </ul>
                </li>
        </div>
        <div class="col p-2">
            <!--Overall Search options-->
            <form class="d-flex searchSizing" action="../script/search_method.php" method="post">
                <input class="form-control" placeholder="Search" type="search" name="search">
                <div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioSearch" id="flexRadioPainting" value="painting" checked>
                        <label class="form-check-label" for="flexRadioPainting">
                            Painting
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioSearch" id="flexRadioArtist" value="artist">
                        <label class="form-check-label" for="flexRadioArtist">
                            Artist
                        </label>
                    </div>
                </div>
                <input class="btn" type="submit">
            </form>

        </div>
    </nav>
</header>