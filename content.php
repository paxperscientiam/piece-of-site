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
$li3 = $d->createElement("li");

$d->appendChild($li, $menu);
$d->appendChild($li2, $li);
$d->appendChild($li3, $li2);


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
