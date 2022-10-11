<?php

/*
        Rhys Gillham
        M133320
        Contains the partial render for the header tag, this contains the nav elements to be shared over all pages.
    */

?>
<header>
    <nav class="navStyle row">
        <div class="col">

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
                <li>
                <div class="col p-2">
                    <form action="template_single.php?\" method="post">     <!-- `template_single - Copy.php` is a temporary file name -->
                        <input type="search" name="search">
                        <input type="submit">
                    </form>
                </div>
                </li>
            </ul>
        </div>
    </nav>
</header>