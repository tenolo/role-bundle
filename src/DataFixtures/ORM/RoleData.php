<?php

namespace Tenolo\Bundle\RoleBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Tenolo\Bundle\CoreBundle\DataFixtures\ORM\AbstractFixture;
use Tenolo\Bundle\EntityBundle\Repository\Interfaces\BaseEntityRepositoryInterface;
use Tenolo\Bundle\RoleBundle\Entity\Interfaces\RoleInterface;

/**
 * Class RoleData
 *
 * @package Tenolo\Bundle\RoleBundle\DataFixtures\ORM
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class RoleData extends AbstractFixture
{

    /**
     * @inheritDoc
     */
    public function load(ObjectManager $manager)
    {
        /** @var BaseEntityRepositoryInterface $repo */
        $repo = $this->findRepository(RoleInterface::class);

        /** @var RoleInterface $userGroup */
        $userGroup = $repo->findOneBy([
            'internalName' => 'ROLE_USER'
        ]);

        if (!$userGroup) {
            $userGroup = $repo->createNew();
            $userGroup->setName('User');
            $userGroup->setInternalName('ROLE_USER');
            $userGroup->setPriority(1);
            $userGroup->setDeletable(false);
            $manager->persist($userGroup);
        }

        /** @var RoleInterface $adminGroup */
        $adminGroup = $repo->findOneBy([
            'internalName' => 'ROLE_ADMIN'
        ]);

        if (!$adminGroup) {
            $adminGroup = $repo->createNew();
            $adminGroup->setName('Admin');
            $adminGroup->setInternalName('ROLE_ADMIN');
            $adminGroup->setPriority(10);
            $adminGroup->setDeletable(false);
            $manager->persist($adminGroup);
        }

        $manager->flush();

        $this->addReference('role-user', $userGroup);
        $this->addReference('role-admin', $adminGroup);
    }

}
