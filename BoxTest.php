<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BoxTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testBoxContents()
 {
     $box = new Box(['toy']);
     $this->assertTrue($box->has('toy'));
     $this->assertFalse($box->has('ball'));
 }

    public function testTakeOneFromTheBox()
 {
     $box = new Box(['torch']);
     $this->assertEquals('torch', $box->takeOne());

     // Null, now the box is empty
     $this->assertNull($box->takeOne());
 }
    public function testStartsWithALetter()
    {
        $box = new Box(['toy', 'torch', 'ball', 'cat', 'tissue']);

        $results = $box->startsWith('t');

        $this->assertCount(3, $results);
        $this->assertContains('toy', $results);
        $this->assertContains('torch', $results);
        $this->assertContains('tissue', $results);

        // Empty array if passed even
        $this->assertEmpty($box->startsWith('s'));
    }
    public function testSluggifyReturnsSluggifiedString()
    {
        $originalString = 'This string will be sluggified';
        $expectedResult = 'this-string-will-be-sluggified';

        $url = new URL();
        $result = $url->sluggify($originalString);
    }
    public function testSluggifyReturnsSluggifiedString1()
    {
        $originalString = 'This string will be sluggified';
        $expectedResult = 'this-string-will-be-sluggified';

        $url = new URL();
        $result = $url->sluggify($originalString);

        $this->assertEquals($expectedResult, $result);
    }
    public function testSluggifyReturnsSluggifiedString2()
    {
        $originalString = 'This string will be sluggified';
        $expectedResult = 'this-string-will-be-sluggified';

        $url = new URL();
        $result = $url->sluggify($originalString);

        $this->assertEquals($expectedResult, $result);
    }

    public function testSluggifyReturnsExpectedForStringsContainingNumbers1()
    {
        $originalString = 'This1 string2 will3 be 44 sluggified10';
        $expectedResult = 'this1-string2-will3-be-44-sluggified10';

        $url = new URL();

        $result = $url->sluggify($originalString);

        $this->assertEquals($expectedResult, $result);
    }

    public function testSluggifyReturnsExpectedForStringsContainingSpecialCharacters1()
    {
        $originalString = 'This! @string#$ %$will ()be "sluggified';
        $expectedResult = 'this-string-will-be-sluggified';

        $url = new URL();

        $result = $url->sluggify($originalString);

        $this->assertEquals($expectedResult, $result);
    }

    public function testSluggifyReturnsExpectedForStringsContainingNonEnglishCharacters1()
    {
        $originalString = "Tänk efter nu – förr'n vi föser dig bort";
        $expectedResult = 'tank-efter-nu-forrn-vi-foser-dig-bort';

        $url = new URL();

        $result = $url->sluggify($originalString);

        $this->assertEquals($expectedResult, $result);
    }

    public function testSluggifyReturnsExpectedForEmptyStrings1()
    {
        $originalString = '';
        $expectedResult = '';

        $url = new URL();

        $result = $url->sluggify($originalString);

        $this->assertEquals($expectedResult, $result);
    }
}
