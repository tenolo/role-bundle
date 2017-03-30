<?php

namespace Tenolo\Bundle\RoleBundle\Entity\Interfaces;

use Tenolo\Bundle\EntityBundle\Entity\Interfaces\DeletableInterface;
use Tenolo\Bundle\EntityBundle\Entity\Interfaces\NameInterface;

/**
 * Interface AbstractRoleInterface
 *
 * @package Tenolo\Bundle\RoleBundle\Entity\Interfaces
 * @author  Nikita Loges
 * @company tenolo GbR
 */
interface AbstractRoleInterface extends NameInterface, DeletableInterface
{

    /**
     * @return string
     */
    public function getInternalName();

    /**
     * @param string $internalName
     */
    public function setInternalName($internalName);

    /**
     * @param int $priority
     */
    public function setPriority($priority);

    /**
     * @return int
     */
    public function getPriority();
}