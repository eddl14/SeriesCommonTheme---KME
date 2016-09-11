<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UtilisateurType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomUtilisateur',TextType::class,['label'=>'Nom'])
            ->add('prenomUtilisateur',TextType::class,['label'=>'Prénom'])
            ->add('pseudoUtilisateur',TextType::class,['label'=>'Pseudo'])
            ->add('mdpUtilisateur',TextType::class,['label'=>'Mdp'])
            ->add('mailUtilisateur',TextType::class,['label'=>'Mail'])
            ->add('dateNaissance', DateType::class,['widget'=>'single_text','format'=>'yyyy-MM-dd'])
            ->add('photoProfil',TextType::class,['label'=>'Photo'])
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Utilisateur'
        ));
    }
}