<?php

namespace Tenolo\Bundle\RoleBundle\Form\Type\Entities;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Tenolo\Bundle\RoleBundle\Entity\Entities\Role;
use Tenolo\Bundle\RoleBundle\Entity\Interfaces\RoleInterface;

/**
 * Class RoleEntityType
 *
 * @package Tenolo\Bundle\RoleBundle\Form\Type\Entities
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class RoleEntityType extends AbstractType
{

    /**
     * @inheritDoc
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'by_reference' => function (Options $options) {
                return (!$options['multiple']);
            },
            'class'        => Role::class,
            'choice_label' => function (RoleInterface $value, $key, $index) {
                if (!$value->getInternalName()) {
                    return $this->getName();
                }

                return $value->getName() . ' (' . $value->getInternalName() . ')';
            },
        ]);
    }

    /**
     * @inheritDoc
     */
    public function getParent()
    {
        return EntityType::class;
    }

}
