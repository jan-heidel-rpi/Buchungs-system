<?php

namespace App\Form;

use App\Entity\Court;
use App\Entity\Player;
use App\Entity\Reservation;

use App\Entity\User;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            //->add('created_at')
            ->add('start_at', DateTimeType::class)
            ->add('end_at',DateTimeType::class)
            ->add('court')
            ->add('Players',EntityType::class,[
                'class'=>Player::class,
                'multiple'=>true,
                'query_builder'=> function(EntityRepository $er){
                return $er->createQueryBuilder('p')
                    ->addOrderBy('p.first_name','ASC');
                }
            ])
            ->add('submit', SubmitType::class,[
                'label'=>'erstelle reservation'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
