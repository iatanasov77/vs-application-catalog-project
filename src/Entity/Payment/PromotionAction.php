<?php namespace App\Entity\Payment;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\PaymentBundle\Model\PromotionAction as BasePromotionAction;

/**
 * @ORM\Table(name="VSPAY_PromotionActions")
 * @ORM\Entity
 */
class PromotionAction extends BasePromotionAction
{
    
}