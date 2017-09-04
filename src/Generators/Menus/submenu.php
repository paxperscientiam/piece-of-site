<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;

use Ramoose\PieceOfSite\Generators\Menus\Menu;
use Ramoose\PieceOfSite\Generators\Menus\Document;

class SubMenu extends Menu
{
    public $header;

    public function __construct(string $header = null)
    {
        $this->header = $header;
    }

    public function addItem($bbb)
    {
        d(self::$container->get("state"));
    }
}
