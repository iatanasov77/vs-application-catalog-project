<?php namespace App\Entity\Payment;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\PaymentBundle\Model\Adjustment as BaseAdjustment;

/**
 * @ORM\Table(name="VSPAY_Adjustments")
 * @ORM\Entity
 */
class Adjustment extends BaseAdjustment
{
    
}