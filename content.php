<?PHP
use Ramoose\PieceOfSite\Generators\Menus\Menu;
use Ramoose\PieceOfSite\Generators\Menus\Foundation\Dropdown;

use Ramoose\PieceOfSite\Generators\Menus\Base;
use Ramoose\PieceOfSite\Generators\Menus\Document;

use Monolog\Logger;
use Monolog\ErrorHandler;

// d(new Monolog\ExceptionHandler);
// $logger = new Logger('Monologger');
// ErrorHandler::register($logger);

///////////////


$menu = Menu::dropdown()
    ->addItem("SHIT")
    ->addItem("BALLS")
    ;
echo $menu->saveHTML();
//echo $menu->saveHTML();
// d($result->base->addItem("SDF"));
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
