<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;

use League\Container\Container;


// @codingStandardsIgnoreStart
use Ramoose\PieceOfSite\Generators\Menus\Foundation\{Dropdown, Simple, Drilldown, Accordion, Responsive};
// @codingStandardsIgnoreEnd

class Menu
{
    public $container;
    //
    public function __construct()
    {
        $this->container = new Container;
        // Required to enable auto wiring.
        $this->container->delegate(
            new \League\Container\ReflectionContainer
        );
    }

    protected static function basic(): Base
    {
        return new Base();
    }

    public static function simple()
    {
        $container->add('menu', 'Ramoose\PieceOfSite\Generators\Menus\Foundation\Simple');
        return new Base($container);
    }

    public static function dropDown(): Base
    {
        $container = (new Menu())->container;

        $container->add("menu", function () {
            return new \Ramoose\PieceOfSite\Generators\Menus\Base(
                new \Ramoose\PieceOfSite\Generators\Menus\Foundation\Dropdown
            );
        });
        // this actually triggers things...hmm
        return $container->get('menu');
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

    // public static function __callStatic($name, $arguments)
    // {
    //     $thisClass = get_called_class();
    //     $msg = "Uknown static method called on $thisClass: '$name' ";
    //     try {
    //         throw new \Exception($msg);
    //     } catch (\Exception $e) {
    //         echo $e->getMessage();
    //     }
    // }
}
