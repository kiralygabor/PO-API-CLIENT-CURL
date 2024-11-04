<?php
 
namespace App\Html;
 
use App\Interfaces\PageInterface;
 
abstract class AbstractPage implements PageInterface
{
    static function head()
    {
        echo '<!DOCTYPE html>
        <html lang="hu-hu">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>REST API Ügyfél</title>
            <!-- Scripts-->
            <script src="js/jquery-3.7.1.js" type="text/javascript"></script>
            <script src="js/app.js" type="text/javascript"></script>
            
            <link rel="stylesheet" href="fontawesome/css/all.css" type="text/css">
            <link rel="stylesheet" href="css/main.css">


        </head>';
    }

    static function nav()
    {
        echo '
        <nav>
            <form name = "nav" method = "post" action = "index.php">
                <button type = "submit" name = "btn-home">
                    <i class = "fa fa-home" title = "Kezdőlap"></i>
                </button>
                <button type = "submit" name = "btn-counties">Megyék</button>
                <button type = "submit" name = "btn-cities">Városok</button>
            </form>
        </nav>';
    }

    static function footer()
    {
        echo '
        <footer>
        </footer>
        </html>';
    }

    abstract static function tableHead();

    abstract static function tableBody(array $entities);

    abstract static function table(array $entities);

    abstract static function editor();

    static function searchbar()
    {
        echo '

            <form method="post" action="" class = "searchBar">
                <input
                    type="search"
                    name="needle"
                    placeholder="Keres"
                    class = "searchBar"
                >
                <button
                    type="submit"
                    id="btn-search"
                    name="btn-search"
                    title="Keres"
                    class = "searchBar"
                >
                    <i class="fa fa-search"></i>
                </button>
            </form>
  
        <br>';
    }


}