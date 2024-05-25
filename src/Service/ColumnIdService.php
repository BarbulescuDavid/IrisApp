<?php

namespace App\Service;

class ColumnIdService
{
    public function titleToNumber(string $columnTitle): float|int
    {
        $result = 0;
        $length = strlen($columnTitle);

        for ($i = 0; $i < $length; $i++) {
            $result = $result * 26 + (ord($columnTitle[$i]) - ord('A') + 1);
        }

        return $result;
    }

    public function numberToTitle(int $columnNumber): string
    {
        $result = '';

        while ($columnNumber > 0) {
            $columnNumber--; // Adjust columnNumber to be 0-based
            $remainder = $columnNumber % 26;
            $result = chr($remainder + ord('A')) . $result;
            $columnNumber = intval($columnNumber / 26);
        }

        return $result;
    }
}