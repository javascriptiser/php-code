<?php
declare(strict_types=1);

namespace Amasty\helpers;
class ENV
{
    public static function getEnv(): array
    {
        $env_file = $_SERVER['DOCUMENT_ROOT'] . '/.env';
        $env_data = file_get_contents($env_file);

        $env_variables = [];

        $lines = explode("\n", $env_data);

        foreach ($lines as $line) {
            $line = trim($line);
            if (empty($line) || strpos($line, '#') === 0) {
                continue;
            }

            $parts = explode('=', $line, 2);
            $key = trim($parts[0]);
            $value = trim($parts[1]);

            $env_variables[$key] = $value;
        }

        return $env_variables;
    }
}