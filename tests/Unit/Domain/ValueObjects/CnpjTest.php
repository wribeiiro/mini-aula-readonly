<?php

use App\Domain\ValueObjects\Cnpj;
use PHPUnit\Framework\Attributes\DataProvider;

class CnpjTest extends \PHPUnit\Framework\TestCase
{
    public static function positiveProvider(): array
    {
        return [
            ['64.481.524/0001/24'],
            ['62.751.291/0001/07'],
            ['57.442.303/0001/81'],
            ['48.283.813/0001/62'],
            ['72.223.288/0001/74'],
        ];
    }

    public static function negativeProvider(): array
    {
        return [
            ['00.000.000/0000/00'],
            ['11.111.111/1110/00'],
            ['00.111.000/0000/00'],
            ['00.000.000/0000/00'],
            ['44444444444444444'],
            ['000.132.234-01'],
        ];
    }

    #[DataProvider('positiveProvider')]
    public function testValueObjectCnpjShouldBeDefined(string $cnpjValue)
    {
        $cnpj = new Cnpj($cnpjValue);
        $this->assertSame((string) $cnpj, $cnpjValue);
    }

    #[DataProvider('negativeProvider')]
    public function testValueObjectCnpjShouldThrowInvalidArgumentException(string $cnpjValue)
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Cnpj invalido');
        new Cnpj($cnpjValue);
    }
}
