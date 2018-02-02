<?php

namespace Tenolo\Bundle\RoleBundle\Entity\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\PersistentCollection;
use Tenolo\Bundle\RoleBundle\Entity\Interfaces\RoleInterface;
use Tenolo\Bundle\UserBundle\Entity\Plan\UserGroupInterface;
use Tenolo\Bundle\UserBundle\Entity\Plan\UserInterface;

/**
 * Class Role
 *
 * @package Tenolo\Bundle\RoleBundle\Entity\Entities
 * @author  Nikita Loges
 * @company tenolo GbR
 *
 * @ORM\Entity(repositoryClass="Tenolo\Bundle\RoleBundle\Repository\RoleRepository")
 */
class Role extends AbstractRole implements RoleInterface
{

    /**
     * @var ArrayCollection|PersistentCollection|UserInterface[]
     * @ORM\ManyToMany(targetEntity="Tenolo\Bundle\UserBundle\Entity\Plan\UserInterface", mappedBy="userRoles", cascade={"persist"})
     */
    protected $users;

    /**
     * @var ArrayCollection|PersistentCollection|UserGroupInterface[]
     * @ORM\ManyToMany(targetEntity="Tenolo\Bundle\UserBundle\Entity\Plan\UserGroupInterface", mappedBy="userRoles", cascade={"persist"})
     */
    protected $userGroups;

    /**
     * @inheritDoc
     */
    public function __construct()
    {
        parent::__construct();

        $this->users = new ArrayCollection();
        $this->userGroups = new ArrayCollection();
    }

    /**
     * @inheritdoc
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @inheritdoc
     */
    public function hasUser(UserInterface $user)
    {
        return $this->getUsers()->contains($user);
    }

    /**
     * @inheritdoc
     */
    public function addUser(UserInterface $user)
    {
        if (!$this->hasUser($user)) {
            $user->getUserRoles()->add($this);
            $this->getUsers()->add($user);
        }
    }

    /**
     * @inheritdoc
     */
    public function removeUser(UserInterface $user)
    {
        if ($this->hasUser($user)) {
            $user->getUserRoles()->removeElement($this);
            $this->getUsers()->removeElement($user);
        }
    }

    /**
     * @inheritdoc
     */
    public function getUserGroups()
    {
        return $this->userGroups;
    }

    /**
     * @inheritdoc
     */
    public function hasUserGroup(UserGroupInterface $userGroup)
    {
        return $this->getUserGroups()->contains($userGroup);
    }

    /**
     * @inheritdoc
     */
    public function addUserGroup(UserGroupInterface $userGroup)
    {
        if (!$this->hasUserGroup($userGroup)) {
            $userGroup->getRoles()->add($this);
            $this->getUserGroups()->add($userGroup);
        }
    }

    /**
     * @inheritdoc
     */
    public function removeUserGroup(UserGroupInterface $userGroup)
    {
        if ($this->hasUserGroup($userGroup)) {
            $userGroup->getRoles()->removeElement($this);
            $this->getUserGroups()->removeElement($userGroup);
        }
    }
}
