<?php namespace App\Entity\Payment;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\PaymentBundle\Model\Promotion as BasePromotion;

/**
 * @ORM\Table(name="VSPAY_Promotions")
 * @ORM\Entity
 */
class Promotion extends BasePromotion
{
    
}