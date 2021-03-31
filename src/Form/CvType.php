<?php

namespace App\Form;

use App\Entity\Cv;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CvType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class, array('label' => 'Nom',
                'attr' => array('class' => 'form-control mt-2 form-group')))
            ->add('prenom',TextType::class, array('label' => 'Prénom',
                'attr' => array('class' => 'form-control mt-2 mb-2 form-group')))
            ->add('formation',TextType::class, array('label' => 'Formation',
                'attr' => array('class' => 'form-control mt-2 mb-2 form-group')))
            ->add('age',IntegerType::class, array('label' => 'Age',
                'attr' => array('class' => 'form-control mt-2 mb-2 form-group')))
            ->add('email',TextType::class, array('label' => 'Email',
                'attr' => array('class' => 'form-control mt-2 mb-2 form-group')))
            ->add('adresse',TextType::class, array('label' => 'Adresse',
                'attr' => array('class' => 'form-control mt-2 mb-2 form-group')))
            ->add('telephone',TextType::class, array('label' => 'Téléphone',
                'attr' => array('class' => 'form-control mt-2 mb-2 form-group')))
            ->add('niveauEtude',TextType::class, array('label' => 'Niveau Etude',
                'attr' => array('class' => 'form-control mt-2 mb-2 form-group')))
            ->add('experiencePro',TextType::class, array('label' => 'Experience Professionnelle',
                'attr' => array('class' => 'form-control mt-2 mb-2 form-group')))
            ->add('logicielMaitrise',TextType::class, array('label' => 'Logiciel(s) Maitrisé(s)',
                'attr' => array('class' => 'form-control mt-2 mb-2 form-group','placeholder' => 'Word; Excel; PowerPoint; ...')))
            ->add('domaineEnquete',TextType::class, array('label' => 'Domaine(s) Deja Enqueté(s)',
                'attr' => array('class' => 'form-control mt-2 mb-2 form-group', 'placeholder' => 'Santé; Education; Agriculture ...')))
            ->add('Offre')
            ->add('submit', SubmitType::class, array('label' => 'Enregistrer', 'attr' => array('class' => 'form-group mt-2 btn btn-secondary')))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Cv::class,
        ]);
    }
}
