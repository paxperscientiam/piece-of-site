<?PHP namespace Ramoose\PieceOfSite\Generators\Menus\Foundation;

use Ramoose\PieceOfSite\Generators\Menus\Base;

class Drilldown
{
    public $classes = [];
    public $subMenuClasses = [];
    public $menuData = [];

    public function __construct()
    {
        $this->classes[] = "drilldown";
        $this->subMenuClasses[] = "nested vertical menu";
        $this->menuData[] = "data-drilldown";
    }
}
