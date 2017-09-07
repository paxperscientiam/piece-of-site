<?PHP namespace Ramoose\PieceOfSite\Generators\Menus\Foundation;

class Dropdown
{
    public $classes = [];
    public $subMenuClasses = [];
    public $menuData = [];
    //
    // orientation
    public $vertical;

    public function __construct()
    {
        $this->classes[] = "menu dropdown";
        $this->subMenuClasses[] = "menu";
        $this->menuData[] = "data-dropdown-menu";
        //
        $this->vertical = "vertical";
    }
}
