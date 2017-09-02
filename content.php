<?PHP
use Ramoose\PieceOfSite\Generators\Menus\Menu;
use Ramoose\PieceOfSite\Generators\Menus\Foundation\Dropdown;

use Monolog\Logger;
use Monolog\ErrorHandler;

// d(new Monolog\ExceptionHandler);
// $logger = new Logger('Monologger');
// ErrorHandler::register($logger);

///////////////





$menu = Menu::dropdown()
    ->addItem("No", "/nooooo")
    ->addItem("Cursing", "/frackyou")
    ->addItem("Please", "/jk")
    ->addItem(Menu::submenu("Nope")
              ->addItem("DEREE")
              ->addItem("BB8")
              //           ->addItem("LOOOOOOOOL")
    )
    ;
d($menu);
d($menu->saveHTML());
// echo $menu->saveHTML();
// d($menu->saveHTML());
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
