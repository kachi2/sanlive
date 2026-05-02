<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Spatie\SchemaOrg\Schema;

class FaqController extends Controller
{
    public function __invoke()
    {
        $meta = [
            'url'         => url()->current(),
            'title'       => 'Frequently Asked Questions – Sanlive Pharmacy Nigeria',
            'metaTitle'   => 'Frequently Asked Questions – Sanlive Pharmacy Nigeria',
            'description' => 'Find answers to common questions about ordering medicines online, delivery times, prescription upload, payments, and more at Sanlive Pharmacy – Nigeria\'s trusted online pharmacy.',
            'keywords'    => 'online pharmacy FAQ Nigeria, medicine delivery questions, how to order medicines online, prescription upload help, sanlive pharmacy support',
            'image_url'   => websiteLogo(),
        ];
        return view('frontend.faq', [
            'faq'      => Faq::latest()->first(),
            'pageMeta' => $meta,
            'schema'   => $this->buildFaqSchema(),
        ]);
    }

    private function buildFaqSchema(): string
    {
        $qas = [
            ['q' => 'How do I order medicines from Sanlive Pharmacy?',
             'a' => 'Browse our catalogue, add items to your cart, and proceed to checkout. You can pay online via card or bank transfer. We deliver to your doorstep across Lagos and Nigeria-wide.'],
            ['q' => 'Do I need a prescription to buy medicines?',
             'a' => 'Prescription medicines require you to upload a valid prescription from a licensed doctor before your order is confirmed. Over-the-counter medicines can be purchased without a prescription.'],
            ['q' => 'How long does delivery take?',
             'a' => 'Same-day or next-day delivery is available in Lagos. Nationwide delivery typically takes 2–5 business days depending on your location.'],
            ['q' => 'What payment methods do you accept?',
             'a' => 'We accept debit/credit cards (Visa, Mastercard), Paystack, Flutterwave, and bank transfers. All payments are processed securely.'],
            ['q' => 'Is Sanlive Pharmacy PCN licensed?',
             'a' => 'Yes. Sanlive Pharmacy is fully registered and licensed by the Pharmacists Council of Nigeria (PCN), ensuring all products are genuine and sourced from verified suppliers.'],
            ['q' => 'Can I return a product?',
             'a' => 'Yes. We accept returns within 2 days of delivery for sealed, unused products. Prescription medicines and perishable items are non-returnable for safety reasons.'],
            ['q' => 'How do I upload my prescription?',
             'a' => 'After adding a prescription-required product to your cart, you will be prompted to upload a photo or scan of your prescription during checkout.'],
            ['q' => 'Do you deliver outside Lagos?',
             'a' => 'Yes. We deliver nationwide across Nigeria. Delivery timelines and fees vary by state. Enter your address at checkout to see available options.'],
        ];

        $entities = array_map(
            fn ($qa) => Schema::question()
                ->name($qa['q'])
                ->acceptedAnswer(Schema::answer()->text($qa['a'])),
            $qas
        );

        return Schema::fAQPage()->mainEntity($entities)->toScript();
    }
}
