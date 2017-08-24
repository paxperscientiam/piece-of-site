<?PHP namespace Ramoose\PieceOfSite\Generators\Menus\Foundation;

use Ramoose\PieceOfSite\Generators\Menus\Base;

class Simple extends Base
{
    public function __construct()
    {
        $this->classes[] = "simple";
        $this->subMenuClasses[] = "nested menu";
        //
        return $this;
    }
}
