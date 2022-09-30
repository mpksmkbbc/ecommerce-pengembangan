<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SeoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'meta_title' => 'salza ecommerce',
            'meta_author' => 'Salza',
            'meta_keyword' => 'ecommerce, salza, salza store',
            'meta_description' => 'jual beli secara online',
            'google_analytics' => 'window.dataLayer = window.dataLayer || [];
                                   function gtag(){dataLayer.push(arguments);}',
        ];
    }
}
