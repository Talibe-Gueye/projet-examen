<?php

namespace App\Form;

use App\Entity\Offre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OffreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomEntreprise',TextType::class, array('label' => 'Nom Etreprise', 'attr' => array('class' => 'form-control form-group')))
            ->add('domaine',TextType::class, array('label' => 'Domaine', 'attr' => array('class' => 'form-control form-group')))
            ->add('profilRecherche',TextType::class, array('label' => 'Poste Recherche', 'attr' => array('class' => 'form-control mb-2 form-group')))
            ->add('User')
            ->add('submit', SubmitType::class,array('label' => 'Envoyer','attr' => array('class' => 'btn btn-secondary mt-2 form-group')))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Offre::class,
        ]);
    }
}
