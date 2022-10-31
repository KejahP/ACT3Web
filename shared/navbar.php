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
                <li class="dropdown">
                    <button class="btn dropdown-toggle" type="" data-bs-toggle="dropdown">Browse</button>
                    <ul class="dropdown-menu">
                        <ul class="dropdown-content">
                            <a class="dropdown-item" href="painting_table.php">Browse Paintings</a></li>
                            <a class="dropdown-item" href="ArtistTable.php">Browse Artists</a></li>
                        </ul>
                    </ul>
                </li>


                <li class="dropdown">
                    <button class="btn dropdown-toggle" data-bs-toggle="dropdown">Paintings </button>
                    <ul class="dropdown-menu">
                        
                        <li class="dropdown">
                        <caption class="btn dropdown-toggle-split" type="button" data-bs-toggle="dropdown" aaria-expanded="false">Styles</button>

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


                        <li><hr class="dropdown-divider"></li>

                        <caption class="btn dropdown-toggle-split" type="" data-bs-toggle="dropdown" aria-expanded="false">Artists</button>

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
            


                <li class="dropdown">
                    <button class="btn dropdown-toggle" type="" data-bs-toggle="dropdown">Artists</button>
                    <ul class="dropdown-menu">
                        
                        <li class="dropdown">
                        <caption class="btn dropdown-toggle-split" type="button" data-bs-toggle="dropdown" aaria-expanded="false">Styles</button>

                        <ul class="dropdown-content">
                            <?php
                            //broken in commands
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


                        <li><hr class="dropdown-divider"></li>

                        <caption class="btn dropdown-toggle-split" type="" data-bs-toggle="dropdown" aria-expanded="false">Life Span</button>
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
        </ul>

        <div class="col p-2">
            <form class="d-flex searchSizing" action="painting_filtered.php" method="post">
                <input class="form-control" placeholder="Search" type="search" name="search">
                <input class="btn" type="submit">
            </form>
        </div>
    </nav>
</header>