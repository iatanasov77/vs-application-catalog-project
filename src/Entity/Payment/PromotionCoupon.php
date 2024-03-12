<?php namespace App\Entity\Payment;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\PaymentBundle\Model\PromotionCoupon as BasePromotionCoupon;

/**
 * @ORM\Table(name="VSPAY_PromotionCoupons")
 * @ORM\Entity
 */
class PromotionCoupon extends BasePromotionCoupon
{
    
}