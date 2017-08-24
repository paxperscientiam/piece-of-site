<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;

// @codingStandardsIgnoreStart
use Ramoose\PieceOfSite\Generators\Menus\Foundation\{Dropdown, Simple, Drilldown, Accordion, Responsive};
// @codingStandardsIgnoreEnd

class Menu
{
    protected $base;

    protected static function basic(): Base
    {
        return new Base();
    }

    public static function simple(): Base
    {
        return new Base(new Simple());
    }

    public static function dropDown(): Base
    {
        return new Base(new DropDown());
    }

    public static function drillDown(): Base
    {
        return new Base(new DrillDown());
    }

    public static function accordion(): Base
    {
        return new Base(new AccordionMenu());
    }

    public static function responsive(string $heading = ""): Responsive
    {
        return new Base(new Responsive($heading));
    }
    //
    //
    public static function subMenu(string $heading = ""): Base
    {
        return new SubMenu($heading);
    }

    public static function __callStatic($name, $arguments)
    {
        $thisClass = get_called_class();
        $msg = "Uknown static method called on $thisClass: '$name' ";
        try {
            throw new \Exception($msg);
        } catch (\Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }
}
