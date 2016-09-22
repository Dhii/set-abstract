<?php

namespace Dhii\Set;

use Dhii\Collection;

/**
 * Common functionality for sets.
 *
 * @since [*next-version*]
 */
abstract class AbstractSet extends Collection\AbstractSearchableCollection
{
    /**
     * Low-level item adding.
     *
     * @since [*next-version*]
     *
     * @param mixed $value The value to add.
     *
     * @return AbstractSet This instance.
     */
    protected function _add($value)
    {
        $this->_addItem($value);

        return $this;
    }

    /**
     * Low-level checking for item existance.
     *
     * @since [*next-version*]
     *
     * @param mixed $value The item to check for.
     *
     * @return bool
     */
    protected function _has($value)
    {
        return $this->_hasItem($value);
    }

    /**
     * Low-level retrieval of all items.
     *
     * @since [*next-version*]
     *
     * @return mixed[]|\Traversable The list of items in the set.
     */
    protected function _items()
    {
        return $this->getItems();
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
     * @see _getItemKey()
     *
     * @param mixed $item The item, for which to generate a unique key.
     */
    protected function _getItemUniqueKey($item)
    {
        return $this->_getItemKey($item);
    }
}
