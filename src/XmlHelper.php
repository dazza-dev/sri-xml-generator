<?php

namespace DazzaDev\SriXmlGenerator;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class XmlHelper
{
    /**
     * Convert view to XML string
     */
    public function getXml(string $view, array $data): string
    {
        $loader = new FilesystemLoader(__DIR__ . '/Views');
        $twig = new Environment($loader);
        return $twig->render($view . '.xml.twig', $data);
    }
}
