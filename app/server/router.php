<?php
// Set timezone
date_default_timezone_set("UTC");
define("VENDOR", dirname(__FILE__, 2)."/vendor");
require_once dirname(__FILE__, 2) . "/vendor/autoload.php";
// Directory that contains error pages
define("ERRORS", dirname(__FILE__) . "/views/errors");
define("VIEWS", dirname(__FILE__) . "/views");



// Default index file
define("DIRECTORY_INDEX", "index.php");

// Optional array of authorized client IPs for a bit of security
$config["hostsAllowed"] = array();

function logAccess($status = 200)
{
    file_put_contents(
        "php://stdout",
        sprintf(
            "[%s] %s:%s [%s]: %sn",
            date("D M j H:i:s Y"),
            $_SERVER["REMOTE_ADDR"],
            $_SERVER["REMOTE_PORT"],
            $status,
            $_SERVER["REQUEST_URI"]
        )
    );
}

// Parse allowed host list
if (!empty($config['hostsAllowed'])) {
    if (!in_array($_SERVER['REMOTE_ADDR'], $config['hostsAllowed'])) {
        logAccess(403);
        http_response_code(403);
        include ERRORS . '/views/403.php';
        exit;
    }
}

// if requesting a directory then serve the default index
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$ext = pathinfo($path, PATHINFO_EXTENSION);
if (empty($ext)) {
    $path = rtrim($path, "/") . "/" . DIRECTORY_INDEX;
}

//If the file exists then return false and let the server handle it
if (file_exists($_SERVER["DOCUMENT_ROOT"] . $path)) {
    d($_SERVER);
    return false;
}

if ($ext === "php") {
    $resource = VIEWS.$_SERVER["REQUEST_URI"];
    if (file_exists($resource)) {
        //  $_SERVER["REQUEST_URI"] = "/";
        // d($_SERVER);
        require_once $_SERVER["DOCUMENT_ROOT"]."/".DIRECTORY_INDEX;
        return true;
    }
    exit;
}


if (in_array($ext, ["js", "css"])) {
    $resource = VENDOR.$_SERVER["REQUEST_URI"];
    $_SERVER['SCRIPT_NAME'] = $resource;
    if (file_exists($resource)) {
        //





        require_once $resource;
        return false;
    }
    exit;
}

// default behavior
logAccess(404);
http_response_code(404);
include ERRORS . "/404.php";
exit;
//
