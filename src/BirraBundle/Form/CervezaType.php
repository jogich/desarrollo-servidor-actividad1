<?php

namespace BirraBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;



class CervezaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre', TextType::class, array('label' => 'Nombre'))
                ->add('pais',TextType::class, array('label' => 'País'))
                ->add('poblacion', TextType::class, array('label' => 'Población'))
                ->add('tipo', TextType::class, array('label' => 'Tipo'))
                ->add('importacion', CheckboxType::class, array('label' => 'Importación'))
                ->add('tamanyo', IntegerType::class, array('label' => 'Tamaño'))
                ->add('fechaAlmacen', DateTimeType::class, array('label' => 'Fecha almacen' , 'widget' => 'choice','html5' => false,'format' => 'dd-MM-yyyy',))
                ->add('cantidad', IntegerType::class, array('label' => 'Cantidad'))
                ->add('foto', TextType::class, array('label' => 'Imagen'))
                ->add('Crear', SubmitType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BirraBundle\Entity\Cerveza'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'birrabundle_cerveza';
    }


}
