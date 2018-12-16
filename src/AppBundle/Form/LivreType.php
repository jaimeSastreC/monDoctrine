<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType; // ajouter pour image
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LivreType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('pages')
            ->add('genre'
                , ChoiceType::class, [
                    'choices' => [
                        'polar'     => 'poche',
                        'digest'    => 'digest',
                        'roman'     => 'roman',
                        'A4'        => 'A4',
                    ],
                'expanded' => true,
                'multiple' => false,
                ]
            )
            ->add('format', ChoiceType::class, [
                'choices' => [
                        'poche' => 'poche',
                        'digest' => 'digest',
                        'roman' => 'roman',
                        'A4'    => 'A4',
                    ]
                ]
            )
            ->add('auteur', EntityType::class,[
                    'class' => 'AppBundle\Entity\Auteur',
                    'choice_label' => 'nom',
                ]
            )
            ->add('image', FileType::class, array(
                'required' => false
            )) // chargement image
            ->add('save', SubmitType::class, array('label' => 'Ajouter un livre'));// ajouter bouton , aussi twig

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Livre'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_livre';
    }
}
