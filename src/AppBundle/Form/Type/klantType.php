<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

//vul aan als je andere invoerveld-typen wilt gebruiken in je formulier
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

//EntiteitType vervangen door b.v. KlantType
class klantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
		//gebruiken wat je nodig hebt, de id hoeft er niet bij als deze auto increment is
        //naam is b.v. een attribuut of variabele van klant
		$builder->add('voornaam', TextType::class);
		$builder->add('achternaam', TextType::class);
		$builder->add('woonplaats', TextType::class);
		$builder->add('klantnummer', IntegerType::class);
		$builder->add('telefoonnummer', TextType::class);
		$builder->add('email', TextType::class);
		//zie
		//http://symfony.com/doc/current/forms.html#built-in-field-types
		//voor meer typen invoer
    }
	
	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array('data_class' => 'AppBundle\Entity\Klant', 
			//Entiteit vervangen door b.v. Klant
		));
	}
}

?>