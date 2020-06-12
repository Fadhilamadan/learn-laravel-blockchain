<?php

namespace App\Repositories\Backend;

use App\Models\Ethereum;
use Ethereum\DataType\EthBlockParam;
use Ethereum\DataType\EthD20;
use Ethereum\Ethereum as ETH;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class EthereumRepository.
 */
class EthereumRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Ethereum::class;
    }

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public function access()
    {
        return new ETH('http://127.0.0.1:7545');
    }

    /**
     * Displays the ethereum status report page.
     *
     * This page provides a overview about Ethereum functions and usage.
     *
     * @param Ethereum $ethAddress Etherum client instance.
     * @return float|int
     */

    function getBalanceAtAddress($ethAddress)
    {
        try {
            $balanceInWei = self::access()->eth_getBalance(new EthD20($ethAddress), new EthBlockParam())->val();
            return self::access()->convertCurrency($balanceInWei);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
