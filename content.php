<?PHP
use Ramoose\PieceOfSite\Generators\Menus\Menu;

use Ramoose\PieceOfSite\Generators\Menus\Document;


use Monolog\Logger;
use Monolog\ErrorHandler;

// d(new Monolog\ExceptionHandler);
// $logger = new Logger('Monologger');
// ErrorHandler::register($logger);

$d = new Document;
$menu = $d->createChunk("ul");
$li = $d->createElement("li");
$li2 = $d->createElement("li");

$d->appendChild([$li, $li2,], $menu);

d($d->saveHTML());

$m = Menu::dropDown()
    ;



    // $m = Menu::dropdown()
//     ->addItem("Polaris")
//     ->addItem("Pollux")
//     ->addItem("Andromeda")
//     ->addItem(Menu::subMenu("Sol")
//               ->addItem("Mercury")
//               ->addItem("Venus")
//     )
//     ->addItem("Anger")
//     ->addItem("Sadness")
//     ->addItem(Menu::subMenu("Books")
//               ->addItem("Lord of the Rings")
//               ->addItem(Menu::subMenu("Sci-Fi"))
//     )
//     ;


//echo $m->saveHTML();
