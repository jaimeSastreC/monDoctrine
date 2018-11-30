<?php

namespace AppBundle\Form;

use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Tests\Extension\Core\Type\SubmitTypeTest;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AuteurType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('dateNaissance',DateType::class, [
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd'
                ]
            )
            ->add('dateMort',DateType::class,[
                    'widget'     => 'single_text',
                    'format'     => 'yyyy-MM-dd',
                    'required'   => false
                ]
            )
            ->add('biographie', TextareaType::class, [
                    'attr' => [
                        'placeholder'=> 'veuillez écrire la biographie'
                    ]
                ]
            )
            ->add('pays',ChoiceType::class, [
                    'choices' => [
                        'France'    => 'France',
                        'Belgique'  => 'Belgique',
                        'Suisse'    => 'Suisse',
                    ]
                ]
            )
            ->add('save', SubmitType::class, [
                    'label' => 'Ajouter un Auteur'
                ]
            ); //fin du builder ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Auteur'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_auteur';
    }


}
