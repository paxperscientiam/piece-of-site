<?PHP namespace Ramoose\PieceOfSite\Generators\Menus\Foundation;

use Ramoose\PieceOfSite\Generators\Menus\MenuInterface;
use Ramoose\PieceOfSite\Generators\Menus\Base;
use Ramoose\PieceOfSite\Generators\Menus\BaseInterface;

class Dropdown extends Base
{
    // autowiring
    public $base;
    //
    public $classes = [];
    public $subClasses = [];
    public $menuData = [];

    public function __construct(Base $base)
    {
        // for autowire
        $this->base = $base;
        //
        $this->classes[] = "menu dropdown";
        $this->subMenuClasses[] = "menu";
        $this->menuData[] = "data-dropdown-menu";
    }
}
