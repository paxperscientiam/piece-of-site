<?PHP namespace Ramoose\PieceOfSite\Generators\Menus\Foundation;

class Basic
{
    public $classes = [];
    public $subMenuClasses = [];
    public $menuData = [];

    // alignment
    public $right = "align-right";
    public $center = "align-center";
    public $expand = "expanded";

    // orientation
    public $vertical = "vertical";

    public function __construct()
    {
        $this->classes[] = "menu";
        $this->subMenuClasses[] = "menu nested vertical";
    }
}
