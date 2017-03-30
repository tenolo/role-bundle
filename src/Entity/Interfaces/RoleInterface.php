<?php

namespace Tenolo\Bundle\RoleBundle\Entity\Interfaces;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\PersistentCollection;
use Tenolo\Bundle\EntityBundle\Entity\Interfaces\BaseEntityInterface;
use Tenolo\Bundle\UserBundle\Entity\Plan\UserGroupInterface;
use Tenolo\Bundle\UserBundle\Entity\Plan\UserInterface;

/**
 * Interface RoleInterface
 *
 * @package Tenolo\Bundle\RoleBundle\Entity\Interfaces
 * @author  Nikita Loges
 * @company tenolo GbR
 */
interface RoleInterface extends AbstractRoleInterface, BaseEntityInterface
{

    /**
     * @return ArrayCollection|PersistentCollection|UserInterface[]
     */
    public function getUsers();

    /**
     * @param UserInterface $user
     *
     * @return bool
     */
    public function hasUser(UserInterface $user);

    /**
     * @param UserInterface $user
     */
    public function addUser(UserInterface $user);

    /**
     * @param UserInterface $user
     */
    public function removeUser(UserInterface $user);

    /**
     * @return ArrayCollection|PersistentCollection|UserGroupInterface[]
     */
    public function getUserGroups();

    /**
     * @param UserGroupInterface $userGroup
     *
     * @return bool
     */
    public function hasUserGroup(UserGroupInterface $userGroup);

    /**
     * @param UserGroupInterface $userGroup
     */
    public function addUserGroup(UserGroupInterface $userGroup);

    /**
     * @param UserGroupInterface $userGroup
     */
    public function removeUserGroup(UserGroupInterface $userGroup);
}
