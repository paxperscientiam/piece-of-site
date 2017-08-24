<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;

// @codingStandardsIgnoreStart
use Ramoose\PieceOfSite\Generators\Menus\Foundation\{Dropdown, Simple, Drilldown, Accordion, Responsive};
// @codingStandardsIgnoreEnd

class Menu
{
    protected $base;

    public static function basic(): Base
    {
        return new Base();
    }

    public static function simple(): Simple
    {
        return new Simple();
    }

    public static function dropDown(): Base
    {
        return new Base(new DropDown());
    }

    public static function drillDown(): DrillDown
    {
        return new DrillDown();
    }

    public static function accordion(): AccordionMenu
    {
        return new AccordionMenu();
    }

    public static function subMenu(string $heading = ""): SubMenu
    {
        return new SubMenu($heading);
    }

    public static function responsive(string $heading = ""): Responsive
    {
        return new Responsive($heading);
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
