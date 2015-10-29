<?php

namespace Acme\RedirectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FabsteiShorturl
 *
 * @ORM\Table(name="fabstei_shorturl", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_9EA97AB95F37A13B", columns={"token"})})
 * @ORM\Entity
 */
class FabsteiShorturl
{
    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=50, nullable=true)
     */
    private $token;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set token
     *
     * @param string $token
     * @return FabsteiShorturl
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string 
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return FabsteiShorturl
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
