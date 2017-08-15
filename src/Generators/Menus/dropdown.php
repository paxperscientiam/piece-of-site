<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;

class Dropdown extends Base
{
    public function __construct()
    {
        self::$classes[] = "dropdown";
        self::$subMenuClasses[] = "nested menu";
        self::$menuData[] = "data-dropdown-menu";
    }
}
