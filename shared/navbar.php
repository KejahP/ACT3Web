<?php

/*
        Rhys Gillham
        M133320
        Contains the partial render for the header tag, this contains the nav elements to be shared over all pages.
    */

?>
<!DOCTYPE html>
<html lang="en">

<header>
    <nav class="navStyle row ">
        <div class="col"></div>
        <div class="col p-2">
            <ul class="d-flex list-format align-items-center justify-content-center">
                <li>
                    <a href=" index.php">
                        Home
                    </a>
                </li>
                <li class="dropdown">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown">Sort by</button>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item">
                            <a href="template_table.php">Table Template</a>
                        </li>
                        <li class="dropdown-item">
                            <a href="template_table.php">Table Template</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="col p-2">
            <form class="d-flex searchSizing">
                <input type="search" class="form-control" id="searchValue" placeholder="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>


    </nav>
</header>