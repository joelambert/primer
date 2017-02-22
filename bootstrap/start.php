<?php

use Rareloop\Primer\Primer;
use Rareloop\Primer\Renderable\Pattern;
use Rareloop\Primer\Events\Event;
use Rareloop\Primer\Templating\ViewData;
use Rareloop\Primer\Templating\View;

/**
 * Listen for when the CLI is created
 */
Event::listen('cli.init', function ($cli) {
    // Register custom commands here
});

/**
 * Listen for whole page render events
 */
Event::listen('render', function ($data) {
    $data->primer->environment = 'development';
});

/**
 * Listen for when new Handlebars objects are created so that we can register any required helpers
 */
Event::listen('twig.init', function ($twig) {
    $twig->setCache(false);
});

/**
 * Create an instance of Primer
 *
 * @var Primer
 */
$primer = Primer::start([
    'basePath' => __DIR__.'/..',
    'templateClass' => Rareloop\Primer\TemplateEngine\Twig\Template::class,

    // This enables us to take advantage of Twig's template extension for our templates
    'wrapTemplate' => false,
]);

return $primer;
