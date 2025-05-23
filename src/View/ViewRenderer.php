<?php

namespace Ludens\View;

use Ludens\Builder\Application;
use Twig\Environment;

class ViewRenderer
{
    /**
     * @var Environment
     */
    private Environment $twig;

    public function __construct(string $templatesDirectory = '/templates')
    {
        $loader = new \Twig\Loader\FilesystemLoader(Application::getBaseDir() . $templatesDirectory);
        $this->twig = new Environment($loader, [
            'cache' => Application::getBaseDir() . '/cache',
            'auto_reload' => true,
            'debug' => true,
        ]);
    }

    /**
     * Renders a view template with the given data.
     *
     * @param string $template
     * @param array $data
     * @return string
     */
    public function render(string $template, array $data = []): string
    {
        return $this->twig->render($template, $data);
    }
}
