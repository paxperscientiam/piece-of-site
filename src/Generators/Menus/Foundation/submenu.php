<?PHP namespace Ramoose\PieceOfSite\Generators\Menus\Foundation;

use Ramoose\PieceOfSite\Generators\Menus\Menu;
use Ramoose\PieceOfSite\Generators\Menus\Menu\Base;
use Ramoose\PieceOfSite\Generators\Menus\Document;

class SubMenu
{
    public $header;

    public function __construct(string $header = null)
    {
        $this->header = $header;
    }
}
