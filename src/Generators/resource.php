<?PHP namespace App\Moose\Generators;

class Resource
{

    private function __construct()
    {
    }

    public static function css(string $path, $attributes = [])
    {
        $resource = new Resource;
        $resource->path = $path;
        $resource->css = new \DOMDocument();
        $resource->fragment = $resource->css->createDocumentFragment();
        $resource->el = $resource->css->createElement("link");

        $resource->el->setAttribute("rel", "stylesheet");
        $resource->el->setAttribute("type", "text/css");
        $resource->el->setAttribute("href", $path);

        foreach ($attributes as $attr => $value) {
            $resource->el->setAttribute($attr, $value);
        }

        $resource->fragment->appendChild($resource->el);
        $resource->css->appendChild($resource->fragment);
        return $resource->css->saveHTML();
    }

    public static function script(string $path, $attributes = [])
    {
        $resource = new Resource;
        $resource->path = $path;
        $resource->script = new \DOMDocument();
        $resource->fragment = $resource->script->createDocumentFragment();
        $resource->el = $resource->script->createElement("script");

        $resource->el->setAttribute("type", "text/javascript");
        $resource->el->setAttribute("src", $path);

        foreach ($attributes as $attr => $value) {
            $resource->el->setAttribute($attr, $value);
        }


        $resource->fragment->appendChild($resource->el);
        $resource->script->appendChild($resource->fragment);
        return $resource->script->saveHTML();
    }
}
