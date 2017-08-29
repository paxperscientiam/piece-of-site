<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;

use Ramoose\PieceOfSite\Generators\Menus\Base as Base;

interface MenuInterface
{
    public function __construct(Base $base);
    public function addItem($thing);
    public function saveHTML();
}
