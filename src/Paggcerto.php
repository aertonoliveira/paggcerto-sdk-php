<?php

namespace Paggcerto;

use Paggcerto\Auth\ToConnect;
use Paggcerto\Service\BankService;
use Paggcerto\Service\BusinessActivityService;
use Paggcerto\Service\BusinessTypeService;
use Paggcerto\Service\CityService;
use Paggcerto\Service\HolderAccountService;
use Paggcerto\Service\MarketingMediaService;

class Paggcerto extends ToConnect
{
    const ACCOUNT_ENDPOINT_SANDBOX = "http://account.sandbox.paggcerto.com.br/api/";
    const ACCOUNT_ENDPOINT_PRODUCTION = "https://account.paggcerto.com.br/api/";
    const PAYMENTS_ENDPOINT_SANDBOX = "http://payments.sandbox.paggcerto.com.br/api/";
    const PAYMENTS_ENDPOINT_PRODUCTION = "https://payments.paggcerto.com.br/api/";
    const SIGNUP_SELLER_MOCK = "http://www.mocky.io/v2/5b844175310000c3350d22e7/";
    const CLIENT = "PaggcertoPhpSdk";
    const CLIENT_VERSION = "0.0.1-beta";

    /**
     * @return HolderAccountService
     */
    public function account()
    {
        return new HolderAccountService($this);
    }

    /**
     * @return CityService
     */
    public function city()
    {
        return new CityService($this);
    }

    /**
     * @return BusinessTypeService
     */
    public function businessType()
    {
        return new BusinessTypeService($this);
    }

    /**
     * @return BankService
     */
    public function bank()
    {
        return new BankService($this);
    }

    /**
     * @return BusinessActivityService
     */
    public function businessActivity()
    {
        return new BusinessActivityService($this);
    }

    /**
     * @return MarketingMediaService
     */
    public function marketingMedia()
    {
        return new MarketingMediaService($this);
    }
}
