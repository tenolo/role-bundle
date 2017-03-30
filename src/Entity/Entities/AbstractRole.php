<?php

namespace Tenolo\Bundle\RoleBundle\Entity\Entities;

use Doctrine\ORM\Mapping as ORM;
use Tenolo\Bundle\EntityBundle\Entity\BaseEntity;
use Tenolo\Bundle\EntityBundle\Entity\Scheme\Deletable;
use Tenolo\Bundle\EntityBundle\Entity\Scheme\Name;
use Tenolo\Bundle\RoleBundle\Entity\Interfaces\AbstractRoleInterface;

/**
 * Class AbstractRole
 *
 * @package Tenolo\Bundle\RoleBundle\Entity\Entities
 * @author  Nikita Loges
 * @company tenolo GbR
 */
abstract class AbstractRole extends BaseEntity implements AbstractRoleInterface
{

    use Deletable;
    use Name;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $internalName;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=false, options={"unsigned"=true})
     */
    protected $priority;

    /**
     * @param int $priority
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    }

    /**
     * @return int
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @return string
     */
    public function getInternalName()
    {
        return $this->internalName;
    }

    /**
     * @param string $internalName
     */
    public function setInternalName($internalName)
    {
        $this->internalName = $internalName;
    }
}
