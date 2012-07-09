<?php

/**
 * sfRestCustomerClient
 *
 * @uses sfRestClientAbstract
 * @package
 * @version $id$
 * @author Sébastien HOUZÉ <sebastien.houze@gmail.com>
 */
class sfRestCustomerClient extends sfRestClient
{
    public function setOptions($options) {
        $this->options = array_merge(array(
            'verb' => 'GET',
            'acceptType' => 'application/xml',
            'serializer' => 'xml',
            'username' => null,
            'password' => null,
            'customer_auth' => null,
            'timeout' => 10
        ), $options);

        return $this;
    }

    public function setAuth()
    {
        if ($this->options['username'] !== null && $this->options['password'] !== null) {
            if ($this->options['digest']) {
                curl_setopt($this->curlHandle, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
            }
            curl_setopt($this->curlHandle, CURLOPT_USERPWD, $this->options['username'] . ':' . $this->options['password']);
        }
    }
}
