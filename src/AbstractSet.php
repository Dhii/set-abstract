<?php

namespace Dhii\Set;

use Dhii\Collection;

/**
 * Common functionality for sets.
 *
 * @since [*next-version*]
 */
abstract class AbstractSet extends Collection\AbstractSearchableCollection implements SetInterface
{
    /**
     * @inheritdoc
     *
     * @since [*next-version*]
     *
     * @return AbstractSet This instance.
     */
    public function add($value)
    {
        $this->_add($value);

        return $this;
    }

    protected function _add($value)
    {
        $this->_addItem($value);

        return $this;
    }

    /**
     * @inheritdoc
     *
     * @since [*next-version*]
     */
    public function has($value)
    {
        return $this->_has($value);
    }

    protected function _has($value)
    {
        return $this->_hasItem($value);
    }

    /**
     * @inheritdoc
     *
     * @since [*next-version*]
     */
    public function items()
    {
        return $this->_items();
    }

    protected function _items()
    {
        return $this->getItems();
    }

    /**
     * @since [*next-version*]
     *
     * @return AbstractSet This instance.
     */
    public function remove($value)
    {
        $this->_remove($value);

        return $this;
    }

    /**
     * Low-level item removal.
     *
     * @since [*next-version*]
     *
     * @param mixed $value
     *
     * @return AbstractSet This instance.
     */
    protected function _remove($value)
    {
        $this->_removeItem($value);

        return $this;
    }

    /**
     * Generates a unique key for an item.
     *
     * Keys generated for the same item will always be the same.
     * This guarantees that the set will not contain 2 instances of the same item.
     *
     * @since [*next-version*]
     *
     * @see _getItemKey()
     *
     * @param mixed $item The item, for which to generate a unique key.
     */
    protected function _getItemUniqueKey($item)
    {
        return $this->_getItemKey($item);
    }
}
