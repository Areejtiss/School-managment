<?php

namespace App\Form;

use App\Entity\Etudiant;
use App\Entity\Classroom;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;

class EtudiantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('matricule')
            ->add('nom')
            ->add('prenom')
            ->add('dateNaiss')
            ->add('Email')
            ->add('classroom',EntityType::class,array(
                'class'=> Classroom::class,
                'expanded'=> true,
                'multiple'=>false,
                'choice_label'=> function(Classroom $classroom){
                    return $classroom->getNom();
                }

            ))
            ->add('photo', FileType::class, [
                'label' => 'Image de profil: ',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                new File([
                'maxSize' => '2048k',
                'mimeTypes' => [
                'image/jpg',
                'image/jpeg',
                'image/bmp',
                'image/npg',
                ],
                'mimeTypesMessage' => 'Please upload a valid image file',
                ])],])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Etudiant::class,
        ]);
    }
}
