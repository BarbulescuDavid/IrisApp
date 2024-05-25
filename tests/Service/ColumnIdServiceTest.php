<?php

namespace App\Tests\Service;

use App\Service\ColumnIdService;
use Mockery as m;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ColumnIdServiceTest extends KernelTestCase
{
    private ColumnIdService|m\MockInterface $service;

    protected function setUp(): void
    {
        parent::setUp();

        $this->service = m::mock(ColumnIdService::class)->makePartial();
    }

    /**
     * @dataProvider titleToNumberDataProvider
     */
    public function testTitleToNumber($value, $expected) {
        $result = $this->service->titleToNumber($value);
        $this->assertEquals($expected,$result);
    }

    /**
     * @dataProvider numberToTitleDataProvider
     */
    public function testNumberToTitle($value, $expected) {
        $result = $this->service->numberToTitle($value);
        $this->assertEquals($expected,$result);
    }

    public function titleToNumberDataProvider(): array
    {
        $testCases = [];
        $testCases['A'] = [
            'value' => 'A',
            'expected' => 1
        ];
        $testCases['B'] = [
            'value' => 'B',
            'expected' => 2
        ];
        $testCases['C'] = [
            'value' => 'C',
            'expected' => 3
        ];
        $testCases['Z'] = [
            'value' => 'Z',
            'expected' => 26
        ];
        $testCases['AA'] = [
            'value' => 'AA',
            'expected' => 27
        ];
        $testCases['AB'] = [
            'value' => 'AB',
            'expected' => 28
        ];
        return  $testCases;
    }

    public function numberToTitleDataProvider(): array
    {
        $testCases = [];
        $testCases['26'] = [
            'value' => 26,
            'expected' => 'Z'
        ];
        $testCases['51'] = [
            'value' => 51,
            'expected' => 'AY'
        ];
        $testCases['52'] = [
            'value' => 52,
            'expected' => 'AZ'
        ];
        $testCases['80'] = [
            'value' => 80,
            'expected' => 'CB'
        ];
        $testCases['676'] = [
            'value' => 676,
            'expected' => 'YZ'
        ];
        $testCases['702'] = [
            'value' => 702,
            'expected' => 'ZZ'
        ];
        $testCases['705'] = [
            'value' => 705,
            'expected' => 'AAC'
        ];
        return  $testCases;
    }
}