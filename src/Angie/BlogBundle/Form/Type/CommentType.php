<?php

namespace Angie\BlogBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CommentType extends AbstractType {
	
	public function buildform(FormBuilderInterface $builder,array $options){
		$builder->add('pseudo');
		$builder->add('is_published',null,array("required"=>false)); //on informe is_published n'est pas obligatoirement renseigné
		//$builder->add('is_published','checkbox',array("required"=>false)); //autre ecriture possible : is_published est du type checkbox et required non obligatoire
		$builder->add('body');
		$builder->add('save','submit');
	
	}
	
	public function getName(){
		return 'post';
	}
}

?>