<?php
/**
 * Created by PhpStorm.
 * User: spot-info
 * Date: 03/08/18
 * Time: 16:28
 */

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseRegistrationFormType;


class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       $builder
           ->add('nom')
           ->add('prenom');
    }

    public function getParent()
    {
        return BaseRegistrationFormType::class;
    }

}