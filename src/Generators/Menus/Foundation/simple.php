<?PHP namespace Ramoose\PieceOfSite\Generators\Menus\Foundation;

class Simple extends XForm
{
    public $classes = [];
    public $subMenuClasses = [];

    public function __construct()
    {
        $this->classes[] = "menu simple";
        $this->subMenuClasses[] = "menu nested";
    }
}
