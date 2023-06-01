<?php

namespace App\Twig;

use Symfony\WebpackEncoreBundle\Asset\EntrypointLookupInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    private $publicDir;
    private $entrypointLookup;


    /**
     * AppExtension constructor.
     */
    public function __construct( string $publicDir, EntrypointLookupInterface $entrypointLookup)
    {
        $this->publicDir = $publicDir;
        $this->entrypointLookup = $entrypointLookup;
    }

    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/2.x/advanced.html#automatic-escaping
            new TwigFilter('encore_css_source', [$this, 'getEncoreEntryCssSource']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('encore_entry_css_source', [$this, 'getEncoreEntryCssSource']),
        ];
    }

    public function getEncoreEntryCssSource(string $entryName)
    {
        $this->entrypointLookup->reset();
        $files = $this->entrypointLookup
            ->getCssFiles($entryName);

        $source = '';
        foreach ($files as $file) {
            $source .= file_get_contents($this->publicDir.'/'.$file);
        }
        return $source;
    }


}
