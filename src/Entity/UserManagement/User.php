<?php namespace App\Entity\UserManagement;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Vankosoft\UsersBundle\Model\User as BaseUser;
use Vankosoft\UsersSubscriptionsBundle\Model\Interfaces\SubscribedUserInterface;
use Vankosoft\UsersSubscriptionsBundle\Model\Traits\SubscribedUserTrait;
use Vankosoft\PaymentBundle\Model\Interfaces\UserPaymentAwareInterface;
use Vankosoft\PaymentBundle\Model\Traits\UserPaymentAwareTrait;
use Vankosoft\PaymentBundle\Model\Interfaces\CustomerInterface;
use Vankosoft\PaymentBundle\Model\Traits\CustomerEntity;

use Vankosoft\CatalogBundle\Model\Interfaces\UserSubscriptionAwareInterface;
use Vankosoft\CatalogBundle\Model\Traits\UserSubscriptionAwareTrait;

use Vankosoft\CatalogBundle\Model\Interfaces\ReviewerAwareInterface;
use Vankosoft\CatalogBundle\Model\Interfaces\ReviewerInterface;
use Vankosoft\CatalogBundle\Model\Reviewer;
use Vankosoft\CatalogBundle\Model\Interfaces\CommenterInterface;
use Vankosoft\CatalogBundle\Model\Traits\CommenterTrait;
use App\Entity\VideoReview;

/**
 * @ORM\Entity
 * @ORM\Table(name="VSUM_Users")
 */
class User extends BaseUser implements
    SubscribedUserInterface,
    UserPaymentAwareInterface,
    CustomerInterface,
    UserSubscriptionAwareInterface,
    ReviewerAwareInterface,
    CommenterInterface
{
    use SubscribedUserTrait;
    use UserPaymentAwareTrait;
    use CustomerEntity;
    use UserSubscriptionAwareTrait;
    use CommenterTrait;
    
    /**
     * @var Collection
     * 
     * @ORM\OneToMany(targetEntity=VideoReview::class, mappedBy="author", indexBy="id", cascade={"all"})
     */
    private $videoReviews;
    
    public function __construct()
    {
        $this->newsletterSubscriptions  = new ArrayCollection();
        $this->orders                   = new ArrayCollection();
        $this->pricingPlanSubscriptions = new ArrayCollection();
        $this->videoReviews             = new ArrayCollection();
        $this->comments                 = new ArrayCollection();
        
        parent::__construct();
    }
    
    /**
     * {@inheritDoc}
     */
    public function getRoles(): array
    {
        /* Use RolesArray ( OLD WAY )*/
        //return $this->getRolesFromArray();
        
        /* Use RolesCollection */
        return $this->getRolesFromCollection();
    }
    
    /**
     * @return Collection|VideoReview[]
     */
    public function getVideoReviews()
    {
        return $this->videoReviews;
    }
    
    public function addVideoReview( VideoReview $videoReview ): self
    {
        if ( ! $this->videoReviews->contains( $videoReview ) ) {
            $this->videoReviews[] = $videoReview;
            $videoReview->setAuthor( $this->_toReviewer() );
        }
        
        return $this;
    }
    
    public function removeVideoReview( VideoReview $videoReview ): self
    {
        if ( $this->videoReviews->contains( $videoReview ) ) {
            $this->videoReviews->removeElement( $videoReview );
            $videoReview->setAuthor( null );
        }
        
        return $this;
    }
    
    public function _toReviewer(): ReviewerInterface
    {
        return Reviewer::fromUser( $this );
    }
}
