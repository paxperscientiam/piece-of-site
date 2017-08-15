<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;

class Drilldown extends Base
{
    public function __construct()
    {
        self::$classes[] = "drilldown";
        self::$subMenuClasses[] = "nested menu";
        self::$menuData[] = "data-drilldown";
    }
}
