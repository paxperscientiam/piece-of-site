<?PHP namespace Ramoose\PieceOfSite\Generators\Menus\Foundation;

use Ramoose\PieceOfSite\Generators\Menus\Base;

class Dropdown extends Base
{
    protected $classes = [];
    protected $subMenuClasses = [];
    protected $menuData = [];

    public function __construct()
    {
        $this->classes[] = "menu dropdown";
        $this->subMenuClasses[] = "menu";
        $this->menuData[] = "data-dropdown-menu";
    }
}
