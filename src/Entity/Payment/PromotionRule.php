<?php namespace App\Entity\Payment;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\PaymentBundle\Model\PromotionRule as BasePromotionRule;

/**
 * @ORM\Table(name="VSPAY_PromotionRules")
 * @ORM\Entity
 */
class PromotionRule extends BasePromotionRule
{
    
}