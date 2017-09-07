<?PHP namespace Ramoose\PieceOfSite\Generators\Menus\Foundation;

class Accordion
{
    public $classes = [];
    public $subMenuClasses = [];
    public $menuData = [];

    public function __construct()
    {
        $this->classes[] = "menu vertical accordion-menu";
        $this->subMenuClasses[] = "menu nested vertical";
        $this->menuData[] = "data-accordion-menu";
    }
}
