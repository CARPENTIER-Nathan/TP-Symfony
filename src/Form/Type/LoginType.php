<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Translation\Loader\XliffFileLoader;
use Symfony\Component\Translation\Translator;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\HttpFoundation\Request;

class LoginType extends AbstractType{

    private $translator;
    public function __construct(TranslatorInterface  $translator){
        $this->translator = $translator;
    }

    public function buildForm(FormBuilderInterface $builder, array $options){
        $contraintes_cases_vides = new Constraints\NotBlank(['message'=>$this->translator->trans("One case can't be blank")]);
        
        // Minimum 8 caractères avec au moins une lettre et un chiffre
        $regex_mdp = new Constraints\Regex(['pattern' => '^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$^', 'message'=>$this->translator->trans("Some characters cannot be used.")]);

        $builder->add('email', EmailType::class,['constraints'=> [$contraintes_cases_vides],'label'=>'Email :'])
                ->add('mdp', RepeatedType::class,[  'type'=>PasswordType::class, 
                                                    'constraints'=> [$contraintes_cases_vides,$regex_mdp],
                                                    'mapped' => false,
                                                    'first_options'=>['label'=> 'Mot de passe : '],
                                                    'second_options'=>['label'=> 'Verification Mot de passe : ']])
                ->add('envoyez', SubmitType::class);
    }
}