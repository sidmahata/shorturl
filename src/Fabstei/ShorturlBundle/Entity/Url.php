<?php

namespace Fabstei\ShorturlBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Url
 *
 * @ORM\Table(name="fabstei_shorturl")
 * @ORM\Entity(repositoryClass="Fabstei\ShorturlBundle\Entity\UrlRepository")
 */
class Url
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=50, precision=0, scale=0, nullable=true, unique=true)
     */
    private $token;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $url;


}
