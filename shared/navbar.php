<?php

/*
        Rhys Gillham
        M133320
        Contains the partial render for the header tag, this contains the nav elements to be shared over all pages.
    */
include_once(dirname(__DIR__) . '/script/temp_connection.php');        //Currently set to connect to xampp using a copy of Andrews initial ConnectionHome.php in resources.

include_once(dirname(__DIR__) . '/script/sql_commands.php')


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
                <li>
                    <a class="btn" href=" template_table.php">
                        Browse
                    </a>
                </li>
                <!--
                <li class="dropdown">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown">Sort by</button>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item">
                            <a class="btn" method="post" href="template_table.php?style=1">
                                <p>
                                    Style
                                </p>
                            </a>
                        </li>
                        <li class="dropdown-item">
                            <a class="btn" method="post" href="template_table.php?artist=1">
                                <p>
                                    Artist
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
-->
                <li class="dropdown">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown">Styles</button>
                    <ul class="dropdown-menu">
                        <?php

                        $styles = returnQuery('style', $conn);

                        foreach ($styles as $value) {
                            echo '  <li class="dropdown-item">
                                        <a class="btn" method="post" href="template_table.php?style=' . $value . '">
                                            <p>' . $value . '</p>
                                        </a>
                                    </li>';
                        }
                        ?>
                    </ul>
                </li>

                <li class="dropdown">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown">Artists</button>
                    <ul class="dropdown-menu">
                        <?php

                        $artists = returnQuery('artist', $conn);

                        foreach ($artists as $value) {
                            echo '  <li class="dropdown-item">
                                        <a class="btn" method="post" href="template_table.php?artist=' . $value . '">
                                            <p>' . $value . '</p>
                                        </a>
                                    </li>';
                        }
                        ?>
                    </ul>
                </li>
            </ul>

        </div>

        <div class="col p-2">
            <form class="d-flex searchSizing" action="template_single.php" method="post">
                <input class="form-control" placeholder="Search" type="search" name="search">
                <input class="btn" type="submit">
            </form>
        </div>
    </nav>
</header>