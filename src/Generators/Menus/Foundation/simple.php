<?PHP namespace Ramoose\PieceOfSite\Generators\Menus\Foundation;

use Ramoose\PieceOfSite\Generators\Menus\Base;

class Simple extends XForm
{
    public function __construct()
    {
        self::$classes[] = "simple";
        self::$subMenuClasses[] = "nested menu";
    }
}
