<?php

require_once __DIR__ . '/mollie/mollie.php';

/**
 * Class mollie_giftcard
 */
class mollie_giftcard extends mollie
{
    public $title = 'Gift cards';

    /**
     * @inheritDoc
     * @return string[][]
     */
    public function _configuration()
    {
        $config = parent::_configuration();
        $config['ISSUER_LIST'] = [
            'configuration_value' => 'none',
            'set_function'        => 'mollie_issuer_list_select( ',
        ];

        return $config;
    }

}