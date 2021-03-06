<?php
/**
 * User: erick.antunes
 * Date: 24/07/2018
 * Time: 11:49
 */

namespace Paggcerto\Auth;

use Paggcerto\Contracts\Authentication;
use Paggcerto\Paggcerto;
use Requests_Session;

class ToConnect
{
    private $paggcertoAuthentication;
    private $endpointEnvironment;
    private $endpoint;
    private $session;

    public function __construct(Authentication $paggcertoAuth = null,
                                $endpointEnvironment = Paggcerto::ENDPOINT_SANDBOX)
    {
        $this->paggcertoAuthentication = $paggcertoAuth;
        $this->endpointEnvironment = $endpointEnvironment;
    }

    public function getEndpointEnvironment()
    {
        return $this->endpointEnvironment;
    }

    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
    }

    public function createNewSession($timeout = 30.0, $connect_timeout = 30.0)
    {
        $user_agent = sprintf('%s/%s (+https://github.com/paggcerto-sa/paggcerto-sdk-php/)', Paggcerto::CLIENT,
            Paggcerto::CLIENT_VERSION);
        $sess = new Requests_Session($this->endpoint);
        $sess->options['timeout'] = $timeout;
        $sess->options['connect_timeout'] = $connect_timeout;
        $sess->options['useragent'] = $user_agent;

        if($this->paggcertoAuthentication != null)
            $sess->options['auth'] = $this->paggcertoAuthentication;

        $this->session = $sess;

        return $sess;
    }

    /**
     * Returns the http session created.
     *
     * @return Requests_Session
     */
    public function getSession()
    {
        return $this->session;
    }

    public function getAuthUrl($endpoint = null)
    {
        if ($endpoint !== null) {
            $this->endpoint = $endpoint;
        }
        return $endpoint;
    }
}