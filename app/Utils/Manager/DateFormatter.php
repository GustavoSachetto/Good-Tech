<?php

namespace App\Utils\Manager;

use Exception;

class DateFormatter 
{
    private static array $months = [
        1 => "Janeiro",
        2 => "Fevereiro",
        3 => "Março",
        4 => "Abril",
        5 => "Maio",
        6 => "Junho",
        7 => "Julho",
        8 => "Agosto",
        9 => "Setembro",
        10 => "Outubro",
        11 => "Novembro",
        12 => "Dezembro"
    ];

    /**
     * Método responsável por formatar a data por extenso
     */
    public static function format(string $date): string
    {
        // Separar a data em partes (ano, mês, dia)
        $parts = explode('-', preg_replace('/\s/', '-', $date));
        
        if (count($parts) < 3) {
            throw new Exception("Formato de data inválido. Use AAAA-MM-DD.");
        }

        list($year, $month, $day) = $parts;

        $day = ltrim($day, '0');
        $month = ltrim($month, '0');

        if (!array_key_exists($month, self::$months)) {
            throw new Exception("Mês inválido.");
        }

        return "{$day} de " . self::$months[$month] . " de {$year}";
    }
}
