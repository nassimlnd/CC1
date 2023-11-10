<?php

namespace App\Form;

use App\Entity\Room;
use Doctrine\DBAL\Types\BooleanType;
use phpDocumentor\Reflection\Types\Boolean;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RoomType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('nbPC', IntegerType::class, ['label' => 'Nombre de PC', 'required' => false])
            ->add('reserved', CheckboxType::class, ['label' => 'Salle réservée', 'required' => false])
            ->add('codeBatiment', ChoiceType::class, ["choices" => [
                'A' => "A",
                'B' => "B",
                'C' => "C",
                'D' => "D",
            ]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Room::class,
        ]);
    }
}
