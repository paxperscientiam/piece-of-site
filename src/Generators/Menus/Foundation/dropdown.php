<?PHP namespace Ramoose\PieceOfSite\Generators\Menus\Foundation;

use Ramoose\PieceOfSite\Generators\Menus\Base;

class Dropdown
{
    protected $base;
    //
    protected $classes = [];
    protected $subClasses = [];
    protected $menuData = [];

    public function __construct(Base $base)
    {
        $this->base = $base;
        //
        $this->classes[] = "menu dropdown";
        $this->subMenuClasses[] = "menu";
        $this->menuData[] = "data-dropdown-menu";
        //
        return $this;
    }
}
