<?PHP namespace Ramoose\PieceOfSite\Generators\Menus\Foundation;

use Ramoose\PieceOfSite\Generators\Menus\Base;

class Dropdown extends Base
{
    public function __construct()
    {
        $this->classes[] = "menu dropdown";
        $this->subMenuClasses[] = "menu vertical";
        //
        $this->menuData[] = "data-dropdown-menu";
    }
}
