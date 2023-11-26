<?php

namespace App\Form;
use App\Entity\Matiere;
use App\Entity\Classroom;
use App\Entity\Enseignant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EnseignantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('dateNais')
            ->add('Email')
            ->add('matieres',EntityType::class,array(
                'class'=> Matiere::class,
                'expanded'=> true,
                'multiple'=>true,
                'choice_label'=> function(Matiere $matieres){
                    return $matieres->getNom();
                }

            ))
            ->add('classrooms',EntityType::class,array(
                'class'=> Classroom::class,
                'expanded'=> true,
                'multiple'=>true,
                'choice_label'=> function(Classroom $classrooms){
                    return $classrooms->getNom();
                }

            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Enseignant::class,
        ]);
    }
    public function __toString()
   {
        return $this->Nom ?? '';
   }
}
