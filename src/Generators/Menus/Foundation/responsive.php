<?PHP namespace Ramoose\PieceOfSite\Generators\Menus\Foundation;

use Ramoose\PieceOfSite\Generators\Menus\Base;

class Responsive extends XForm
{
    public function __construct()
    {
        self::$classes[] = "medium-horizontal";
        self::$subMenuClasses[] = "nested menu";
    }
}
