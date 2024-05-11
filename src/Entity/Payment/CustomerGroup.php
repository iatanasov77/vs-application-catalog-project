<?php namespace App\Entity\Payment;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\PaymentBundle\Model\CustomerGroup as BaseCustomerGroup;

/**
 * @ORM\Table(name="VSPAY_CustomerGroups")
 * @ORM\Entity
 */
class CustomerGroup extends BaseCustomerGroup
{
    
}
