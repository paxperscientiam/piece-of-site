<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;

use Ramoose\PieceOfSite\Generators\Menus\Base;
use Ramoose\PieceOfSite\Generators\Menus\Document;

// @codingStandardsIgnoreStart
use Ramoose\PieceOfSite\Generators\Menus\Foundation\{Dropdown, Simple, Drilldown, Accordion, Responsive};
// @codingStandardsIgnoreEnd

class Menu
{
    public $container;

    public function __construct()
    {
        $this->container = new \League\Container\Container;
        // autowiring
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

    }

    public static function dropDown()
    {
        $container = (new Menu)->container;
        $container->add('Base', 'Ramoose\PieceOfSite\Generators\Menus\Base')
            ->withArgument('Ramoose\PieceOfSite\Generators\Menus\Document')
            ->withArgument('Ramoose\PieceOfSite\Generators\Menus\Foundation\Dropdown');

        return $container->get('Base');
    }

    public static function drillDown()
    {

    }

    public static function accordion(): Base
    {
        return new Base(new AccordionMenu());
    }

    // public static function responsive(string $heading = ""): Responsive
    // {
    //     return new Base(new Responsive($heading));
    // }
    // //
    //
    public static function subMenu(string $heading = "")
    {
        $container = (new Menu)->container;

        $container->add('Submenu', 'Ramoose\PieceOfSite\Generators\Menus\Submenu')
            ->withArgument($heading);
        //
        $container->add('Base', 'Ramoose\PieceOfSite\Generators\Menus\Base')
            ->withArgument('Ramoose\PieceOfSite\Generators\Menus\Document')
            ->withArgument('Submenu')
            ;

        return $container->get('Base');
    }

    public static function __callStatic($name, $arguments)
    {
        $thisClass = get_called_class();
        $msg = "Uknown static method called on $thisClass: '$name' ";
        try {
            throw new \Exception($msg);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
