<?php

use PHPUnit\Framework\TestCase;
use App\TagParser;

class TagParserWithDataProviderTest extends TestCase
{
    /**
     * @dataProvider tagsProvider
     */
    public function test_it_parses_tags($input, $expected)
    {
        $parser = new TagParser();
        $this->assertSame($expected, $parser->parse($input));
    }

    public static function tagsProvider(): array
    {
        return [
            ['personal', ['personal']],
            ['personal, work, family', ['personal', 'work', 'family']],
            ['personal,work,family', ['personal', 'work', 'family']],
            ['personal | work | family', ['personal', 'work', 'family']],
            ['personal|work|family', ['personal', 'work', 'family']],
            ['personal : work : family', ['personal', 'work', 'family']],
            ['personal:work:family', ['personal', 'work', 'family']],
        ];
    }
}
