<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class CustomSanitize extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('sanitize', [$this, 'customSanitize']),
        ];
    }

    public function customSanitize($input)
    {
        if ($input instanceof \DateTime)
        {
            $sanitized = $input->format('Y-m-d H:i:s');
            if ($sanitized)
            {
                return $sanitized;
            }
            else
            {
                return "Invalid time";
            }
        }
        elseif (is_array($input))
        {
            return implode(", ",$input);
        }

        return $input;
    }
}

?>