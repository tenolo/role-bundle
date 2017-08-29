<?php

namespace Tenolo\Bundle\RoleBundle\Repository;

use Tenolo\Bundle\EntityBundle\Repository\BaseEntityRepository;
use Tenolo\Bundle\RoleBundle\Entity\Interfaces\AbstractRoleInterface;

/**
 * Class AbstractRoleRepository
 *
 * @package Tenolo\Bundle\RoleBundle\Repository
 * @author  Nikita Loges
 */
class AbstractRoleRepository extends BaseEntityRepository
{

    /**
     * @param $name
     *
     * @return null|object|AbstractRoleInterface
     */
    public function findOneByInternalName($name)
    {
        return $this->findOneBy([
            'internalName' => $name
        ]);
    }
}
