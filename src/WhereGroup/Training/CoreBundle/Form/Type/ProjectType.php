<?php

namespace WhereGroup\Training\CoreBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class ProjectType
 *
 * @package WhereGroup\CoreBundle\Form\Type
 * @author  A.R.Pour <info@rpour.de>
 */
class ProjectType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array(
                'label' => 'Bezeichnung',
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('description', 'textarea', array(
                'label' => 'Beschreibung',
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('leader', 'text', array(
                'label' => 'Projektleiter',
                'attr' => array(
                    'class' => 'form-control'
                )
            ));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'project';
    }
}