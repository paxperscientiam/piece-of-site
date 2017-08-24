<?PHP namespace Ramoose\PieceOfSite\Generators\Menus\Foundation;

use Ramoose\PieceOfSite\Generators\Menus\Base;

class Drilldown extends Base
{
    public function __construct()
    {
        $this->classes[] = "drilldown";
        $this->subMenuClasses[] = "nested vertical menu";
        $this->menuData[] = "data-drilldown";
        //
        return $this;
    }
}
