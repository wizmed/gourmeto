<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{
    /**
     * @return array<TwigFilter>
     */
    public function getFilters(): array
    {
        return [
            new TwigFilter('add_line_breaks', [$this, 'addLineBreaks'], ['is_safe' => ['html']]),
        ];
    }

    public function addLineBreaks(string $text): string
    {
        // Remplace chaque point suivi d'un espace par un point suivi de deux balises <br>
        return nl2br(preg_replace('/(\. )/', '.<br><br>', $text));
    }
}
