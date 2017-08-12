<?PHP

require_once "../vendor/autoload.php";

use Ramoose\PieceOfSite\Generators\Menus\Menu;





$menu = Menu::simple()
    ->addItem("USA")
    ->addItem("Canada", Menu::subMenu())

    // ->addSubMenu(Menu::subMenu()
    //              ->addItem("Nova Scotia"))
    ;
d($menu);
// $menu = new Menu("simple");
// //
// $menu->addItem('A')
//     ->addItem('B')
//     ->addNode('C',addItem("CA"))
//     ;

// // d("W");
//d($menu);
echo $menu->saveHTML();
?>
