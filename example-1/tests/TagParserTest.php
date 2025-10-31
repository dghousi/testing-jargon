
<?php

use PHPUnit\Framework\TestCase;
use App\TagParser;

class TagParserTest extends TestCase
{

    protected TagParser $parser;
    
    protected function setUp(): void
    {
        $this->parser = new TagParser();
    }

    public function test_it_parses_a_single_unit_tag()
    {
        $result = $this->parser->parse('personal');
        $expected = ['personal'];

        $this->assertSame($expected, $result);
    }

    public function test_it_parses_comma_seperated_list_of_tags()
    {
        $result = $this->parser->parse('personal, work, family');
        $expected = ['personal', 'work', 'family'];

        $this->assertSame($expected, $result);       
    }

    public function test_spaces_are_optional_in_list_of_tags_with_commas()
    {
        $result = $this->parser->parse('personal,work,family');
        $expected = ['personal', 'work', 'family'];

        $this->assertSame($expected, $result); 
    }

    public function test_it_pipe_seperated_list_of_tags()
    {
        $result = $this->parser->parse('personal | work | family');
        $expected = ['personal', 'work', 'family'];

        $this->assertSame($expected, $result); 
    }

    public function test_spaces_are_optional_in_list_of_tags_with_pipes()
    {
        $result = $this->parser->parse('personal|work|family');
        $expected = ['personal', 'work', 'family'];

        $this->assertSame($expected, $result); 
    }

    public function test_it_colon_seperated_list_of_tags()
    {
        $result = $this->parser->parse('personal :    work : family');
        $expected = ['personal', 'work', 'family'];

        $this->assertSame($expected, $result); 
    }

    public function test_spaces_are_optional_in_list_of_tags_with_colons()
    {
        $result = $this->parser->parse('personal:work:family');
        $expected = ['personal', 'work', 'family'];

        $this->assertSame($expected, $result); 
    }
}