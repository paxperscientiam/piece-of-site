<?PHP namespace Ramoose\PieceOfSite\Generators\Menus\Foundation;

use Ramoose\PieceOfSite\Generators\Menus\Base;

class Dropdown
{
    public $classes = [];
    public $subMenuClasses = [];
    public $menuData = [];

    public function __construct()
    {
        $this->classes[] = "menu dropdown";
        $this->subMenuClasses[] = "menu";
        $this->menuData[] = "data-dropdown-menu";
        //
        $this->firstllClass = "is-dropdown-submenu-parent";
    }
}
