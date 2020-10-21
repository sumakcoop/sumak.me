<?php
// This file is part of Sumak.me
// Copyright (C) 2020 Asociación SUMAK <info (at) sumakcoop (dot) org
// 
// Sumak.me is free software: you can redistribute it and/or modify
// it under the terms of the GNU Affero General Public License as
// published by the Free Software Foundation, either version 3 of the
// License, or (at your option) any later version.
// 
// Sumak.me is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU Affero General Public License for more details.
// 
// You should have received a copy of the GNU Affero General Public License
// along with Sumak.me.  If not, see <http://www.gnu.org/licenses/>.

namespace App\Form;

use App\Entity\Post;
use App\Form\Type\DateTimePickerType;
use App\Form\Type\TagsInputType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\String\Slugger\SluggerInterface;

/**
 * Defines the form used to create and manipulate blog posts.
 *
 * @author Ryan Weaver <weaverryan@gmail.com>
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 * @author Yonel Ceruto <yonelceruto@gmail.com>
 */
class PostType extends AbstractType
{
    private $slugger;

    // Form types are services, so you can inject other services in them if needed
    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // For the full reference of options defined by each form field type
        // see https://symfony.com/doc/current/reference/forms/types.html

        // By default, form fields include the 'required' attribute, which enables
        // the client-side form validation. This means that you can't test the
        // server-side validation errors from the browser. To temporarily disable
        // this validation, set the 'required' attribute to 'false':
        // $builder->add('title', null, ['required' => false, ...]);

        $builder
            ->add('title', null, [
                'attr' => ['autofocus' => true],
                'label' => 'label.title',
            ])
            ->add('summary', TextareaType::class, [
                'help' => 'help.post_summary',
                'label' => 'label.summary',
            ])
            ->add('content', null, [
                'attr' => ['rows' => 20],
                'help' => 'help.post_content',
                'label' => 'label.content',
            ])
            ->add('publishedAt', DateTimePickerType::class, [
                'label' => 'label.published_at',
                'help' => 'help.post_publication',
            ])
            ->add('tags', TagsInputType::class, [
                'label' => 'label.tags',
                'required' => false,
            ])
            // form events let you modify information or fields at different steps
            // of the form handling process.
            // See https://symfony.com/doc/current/form/events.html
            ->addEventListener(FormEvents::SUBMIT, function (FormEvent $event) {
                /** @var Post */
                $post = $event->getData();
                if (null !== $postTitle = $post->getTitle()) {
                    $post->setSlug($this->slugger->slug($postTitle)->lower());
                }
            })
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
