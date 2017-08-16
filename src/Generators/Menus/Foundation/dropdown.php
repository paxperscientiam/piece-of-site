<?PHP namespace Ramoose\PieceOfSite\Generators\Menus\Foundation;

use Ramoose\PieceOfSite\Generators\Menus\Base;

class Dropdown extends Base
{
    public function __construct()
    {
        self::$classes[] = "dropdown";
        self::$subMenuClasses[] = "nested menu";
        self::$menuData[] = "data-dropdown-menu";
    }
}
