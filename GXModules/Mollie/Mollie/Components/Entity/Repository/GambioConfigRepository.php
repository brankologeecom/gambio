<?php

namespace Mollie\Gambio\Entity\Repository;

/**
 * Class GambioConfigRepository
 *
 * @package Mollie\Gambio\Entity\Repository
 */
class GambioConfigRepository extends GambioBaseRepository
{
    const TABLE_NAME = 'gx_configurations';
    const KEY_ALIAS = 'configuration_key';
    const VALUE_ALIAS = 'configuration_value';

    /**
     * @return mixed
     */
    public function getMollieConfiguration()
    {
        return $this->queryBuilder->select($this->getSelectQuery())
            ->where('`key` LIKE', 'configuration/MODULE_PAYMENT_MOLLIE_%', true)
            ->get($this->_getTableName())
            ->result('array');
    }

    /**
     * @param $key
     *
     * @return mixed
     */
    public function getByKey($key)
    {
        return $this->queryBuilder->select($this->getSelectQuery())
            ->where('`key`', $key, true)
            ->get($this->_getTableName())
            ->result('array');
    }

    public function insert($values)
    {
        $this->queryBuilder->insert(self::TABLE_NAME, $values, true);
    }

    /**
     * @return string
     */
    protected function _getTableName()
    {
        return self::TABLE_NAME;
    }

    /**
     * @return string
     */
    protected function _getIdentifierKey()
    {
        return '';
    }

    /**
     * @return string
     */
    protected function getSelectQuery()
    {
        return '`key` as ' . self::KEY_ALIAS . ', `value` as '. self::VALUE_ALIAS;
    }
}
