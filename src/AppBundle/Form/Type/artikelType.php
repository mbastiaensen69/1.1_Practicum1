<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

//vul aan als je andere invoerveld-typen wilt gebruiken in je formulier
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;

//EntiteitType vervangen door b.v. KlantType
class artikelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
		//gebruiken wat je nodig hebt, de id hoeft er niet bij als deze auto increment is
        $builder->add('artikelnummer', IntegerType::class);
        $builder->add('omschrijving', TextType::class);
        $builder->add('specificatie', TextType::class);
        $builder->add('lokatie', TextType::class);
        $builder->add('inkoopprijs', MoneyType::class, array('scale' => 2,));
        $builder->add('minVoorraad', IntegerType::class);
        $builder->add('voorraad', IntegerType::class);
        $builder->add('bestelserie', IntegerType::class);
        $builder->add('vervangende_code', IntegerType::class);
			//naam is b.v. een attribuut of variabele van klant
        
		//zie
		//http://symfony.com/doc/current/forms.html#built-in-field-types
		//voor meer typen invoer
    }
	
	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'AppBundle\Entity\artikel', //Entiteit vervangen door b.v. Klant
		));
	}
}

?>