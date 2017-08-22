<?PHP namespace Ramoose\PieceOfSite\Generators\Menus\Foundation;

use Ramoose\PieceOfSite\Generators\Menus\Base;

class Drilldown extends Base
{
    public function __construct()
    {
        self::$classes[] = "drilldown";
        self::$subMenuClasses[] = "nested vertical menu";
        self::$menuData[] = "data-drilldown";
    }
}
