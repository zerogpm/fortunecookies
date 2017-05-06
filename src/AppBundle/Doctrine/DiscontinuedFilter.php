<?php
/**
 * Created by PhpStorm.
 * User: jiansu
 * Date: 5/4/17
 * Time: 9:57 PM
 */

namespace AppBundle\Doctrine;


use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Query\Filter\SQLFilter;

class DiscontinuedFilter extends SQLFilter
{
    public function addFilterConstraint(ClassMetadata $targetEntity, $targetTableAlias)
    {
        if ($targetEntity->getReflectionClass()->name != 'AppBundle\Entity\FortuneCookie') {
            return '';
        }

        return sprintf('%s.discontinued = %s', $targetTableAlias, $this->getParameter('discontinued'));
    }

}