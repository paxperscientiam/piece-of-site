<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;

use Ramoose\PieceOfSite\Generators\Menus\Base;
use Ramoose\PieceOfSite\Generators\Menus\Document;

class Menu
{
    public static $container;
    public static $dom;

    public function __construct()
    {
        self::$container = new \League\Container\Container;
        // autowiring
        self::$container->delegate(
            new \League\Container\ReflectionContainer
        );

        self::$dom = new Document;
    }

    public static function subMenu($heading)
    {
        return new Submenu(self::$container, $heading);
    }

    public static function __callStatic($name, $arguments)
    {
        new Menu();
        //
        $thisClass = get_called_class();
        $msg = "Uknown static method: $thisClass::$name( ) ";
        $menuClass = "Ramoose\PieceOfSite\Generators\Menus\Foundation\\$name";

        try {
            if (class_exists($menuClass)) {
                self::$container->add('Menu', $menuClass);
                self::$container->add('Base', 'Ramoose\PieceOfSite\Generators\Menus\Base')
                    ->withArgument(self::$dom)
                    ->withArgument('Menu')
                    ;

                return self::$container->get('Base');
            }
            throw new \Exception($msg);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
