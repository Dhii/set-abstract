<?php

namespace Dhii\Set\FuncTest;

/**
 * Tests {@see \Dhii\Set\AbstractSet}.
 *
 * @since [*next-version*]
 */
class AbstractSetTest extends \Xpmock\TestCase
{
    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     * @return \Dhii\Set\AbstractSet The new instance of the test subject.
     */
    public function createInstance()
    {
        $mock = $this->mock('Dhii\\Set\\AbstractSet')
                ->_validateItem()
                ->new();

        return $mock;
    }

    /**
     * Tests whether a valid instance of the test subject can be created.
     *
     * @since [*next-version*]
     */
    public function testCanBeCreated()
    {
        $subject = $this->createInstance();

        $this->assertInstanceOf('Dhii\\Set\\AbstractSet', $subject, 'Subject is not a valid set');
    }

    /**
     * Tests whether correct items can be retrieved from the set.
     *
     * @since [*next-version*]
     */
    public function testAddReportItems()
    {
        $subject = $this->createInstance();
        $reflection = $this->reflect($subject);

        $reflection->_add('apple');
        $reflection->_add('banana');
        $reflection->_add('orange');

        $items = $reflection->_items();

        $this->assertEquals(3, count($items), 'The number of items reported by the set is wrong');
        $this->assertTrue(in_array('apple', $items), 'The set does not seem to contain one of the required items');
        $this->assertTrue(in_array('banana', $items), 'The set does not seem to contain one of the required items');
        $this->assertTrue(in_array('orange', $items), 'The set does not seem to contain one of the required items');
        $this->assertFalse(in_array('pear', $items), 'The set seems to contain an extra item');

        $reflection->_add('pear');
        $this->assertEquals(4, count($reflection->_items()), 'The number of items reported by the set is wrong');
        $this->assertTrue($reflection->_has('pear'), 'The set does not seem to contain one of the required items');
    }

    /**
     * Tests whether the set may only contain unique items.
     *
     * @since [*next-version*]
     */
    public function testUniqueItemsOnly()
    {
        $subject = $this->createInstance();
        $reflection = $this->reflect($subject);

        $reflection->_add('orange');
        $reflection->_add('apple');
        $reflection->_add('banana');
        $reflection->_add('orange');
        $reflection->_add('banana');
        $reflection->_add('apple');
        $reflection->_add('orange');

        $items = $reflection->_items();
        $this->assertEquals(3, count($items), 'The number of items reported by the set is wrong');
        $this->assertTrue(in_array('apple', $items), 'The set does not seem to contain one of the required items');
        $this->assertTrue(in_array('banana', $items), 'The set does not seem to contain one of the required items');
        $this->assertTrue(in_array('orange', $items), 'The set does not seem to contain one of the required items');
    }

    /**
     * Tests whether the set may only contain unique items.
     *
     * @since [*next-version*]
     */
    public function testCanRemoveItems()
    {
        $subject = $this->createInstance();
        $reflection = $this->reflect($subject);

        $reflection->_add('orange');
        $reflection->_add('apple');
        $reflection->_add('banana');

        $items = $reflection->_items();
        $this->assertEquals(3, count($items), 'The number of items reported by the set is wrong');
        $this->assertTrue(in_array('banana', $items), 'The set does not seem to contain one of the required items');
        $this->assertTrue(in_array('orange', $items), 'The set does not seem to contain one of the required items');
        $this->assertTrue(in_array('apple', $items), 'The set does not seem to contain one of the required items');

        $reflection->_remove('apple');
        $items = $reflection->_items();
        $this->assertEquals(2, count($items), 'The number of items reported by the set is wrong');
        $this->assertFalse(in_array('apple', $items), 'The set seems to contain an extra item');
    }


}
