<?PHP namespace Ramoose\FoundationSites\Util;

use Ramoose\FoundationSites\Foundation;

class Resource extends Foundation
{
    private $resourceTypes = ["css", "style", "script", "js"];

    public function __construct()
    {
    }

    public static function css(string $path, $attributes = [], $doc = null)
    {
        $resource = new static();

        $resource->path = $path;

        $resource->css = self::settleDoc($doc);

        $resource->fragment = $resource->css->createDocumentFragment();
        $resource->el = $resource->css->createElement("link");

        $resource->el->setAttribute("rel", "stylesheet");
        $resource->el->setAttribute("type", "text/css");
        $resource->el->setAttribute("href", $path);

        foreach ($attributes as $attr => $value) {
            $resource->el->setAttribute($attr, $value);
        }

        if ($doc !== null) {
            return $resource;
        }
        if ($doc === null) {
            $resource->fragment->appendChild($resource->el);
            $resource->css->appendChild($resource->fragment);
            return $resource->css->saveHTML();
        }
    }

    public static function script(string $path, $attributes = [], $doc = null)
    {
        $resource = new static();

        $resource->path = $path;

        $resource->script = self::settleDoc($doc);

        $resource->fragment = $resource->script->createDocumentFragment();
        $resource->el = $resource->script->createElement("script");

        $resource->el->setAttribute("type", "text/javascript");
        $resource->el->setAttribute("src", $path);

        foreach ($attributes as $attr => $value) {
            $resource->el->setAttribute($attr, $value);
        }

        if ($doc !== null) {
            return $resource;
        }
        if ($doc === null) {
            $resource->fragment->appendChild($resource->el);
            $resource->script->appendChild($resource->fragment);
            return $resource->script->saveHTML();
        }
    }

    private static function settleDoc($doc)
    {
        if ($doc !== null) {
            return $doc->doc;
        }
        return new \DOMDocument;
    }
}
