<?php

require_once '../eCloudSearch.php';

class eCloudSearchTest extends PHPUnit_Framework_TestCase
{

	public $ecs;

    function setUp() {

    	$this->ecs = new eCloudSearch();
    	$this->ecs->set_search_endpoint('search-item-master-56q2jppixktenccxtkyngvmvge.us-east-1.cloudsearch.amazonaws.com');
    	$this->ecs->set_document_endpoint('doc-item-master-56q2jppixktenccxtkyngvmvge.us-east-1.cloudsearch.amazonaws.com');

    }

    function tearDown() {
    }


    function testfind() {

    	$results = $this->ecs->find('nt7e20cd', array('part_number'));
    	$this->assertInstanceOf('eCloudSearchResult', $results);

    }

//     // test the toString function
//     function testToString() {
//         $result = $this->abc->toString('contains %s');
//         $expected = 'contains abc';
//         $this->assertTrue($result == $expected);
//     }

//     // test the copy function
//     function testCopy() {
//       $abc2 = $this->abc->copy();
//       $this->assertEquals($abc2, $this->abc);
//     }

//     // test the add function
//     function testAdd() {
// //         $abc2 = new String('123');
//         $this->abc->add($abc2);
//         $result = $this->abc->toString("%s");
//         $expected = "abc123";
//         $this->assertTrue($result == $expected);
//     }
  }
?>