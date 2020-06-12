<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\Backend\EthereumRepository;

class EthereumController extends Controller
{
    private $repository;

    public function __construct(EthereumRepository $repository)
    {
        $this->repository = $repository;
    }

    public function account()
    {
        try {
            $accounts = [];

            foreach ($this->repository->access()->eth_accounts() as $key => $item) {
                $result = [
                    'address' => $item->hexVal(),
                    'balance' => $this->repository->getBalanceAtAddress($item->hexVal()),
                ];

                $accounts[] = $result;
            }

            return $accounts;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
