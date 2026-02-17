<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Family Visa',
                'icon' => 'icon-family-visa',
                'slug' => 'family-visa',
                'description' => 'Reunite with loved ones abroad through our simplified family visa.',
                'page_content' => 'Family visa programs are designed to keep families together. Whether you\'re sponsoring a spouse, dependent children, or parents, our expert consultants will guide you through the entire process. We handle all documentation, ensure compliance with immigration regulations, and maximize your chances of approval. With our proven track record of successful family sponsorships, you can trust us to bring your loved ones to Canada.',
                'display_order' => 1,
            ],
            [
                'name' => 'Students Visa',
                'icon' => 'icon-students-visa',
                'slug' => 'students-visa',
                'description' => 'Secure your dream education overseas with expert visa guidance.',
                'page_content' => 'Pursuing education abroad opens doors to world-class institutions and career opportunities. Our student visa services cover application preparation, documentation, financial proof verification, and interview coaching. We specialize in helping students navigate complex visa requirements and secure study permits for Canada\'s top universities and colleges. Post-graduation work permits are also available to extend your stay and gain Canadian work experience.',
                'display_order' => 2,
            ],
            [
                'name' => 'Business Visa',
                'icon' => 'icon-business-visa',
                'slug' => 'business-visa',
                'description' => 'Expand your business internationally with expert guidance.',
                'page_content' => 'Expand your entrepreneurial ambitions with our comprehensive business visa solutions. We assist with investor visas, startup visas, and business immigration programs. Our services include business plan development, investment verification, compliance documentation, and regulatory guidance. Whether you\'re establishing a new venture in Canada or relocating your existing business, we provide end-to-end support to ensure smooth business immigration.',
                'display_order' => 3,
            ],
            [
                'name' => 'Travel Visa',
                'icon' => 'icon-travel-visa',
                'slug' => 'travel-visa',
                'description' => 'Enjoy hassle-free travel experiences with our reliable visa.',
                'page_content' => 'Travel with confidence using our comprehensive travel visa services. We assist with visitor visas, tourist visas, and temporary resident permits for multiple destinations. Our team ensures all travel documentation is accurate and complete, significantly improving approval chances. We handle visa applications for various countries and provide consultation on travel requirements, interview preparation, and compliance documentation.',
                'display_order' => 4,
            ],
            [
                'name' => 'Immigration Visa',
                'icon' => 'icon-immigration-visa',
                'slug' => 'immigration-visa',
                'description' => 'Access trusted immigration resources with complete guidance.',
                'page_content' => 'Permanent residency is the pathway to building a new life in Canada. Our immigration visa services include Express Entry assistance, provincial nominee programs, skilled worker visas, and immigration pathways. We evaluate your qualifications, assist with document preparation, optimize your profile for maximum eligibility, and provide comprehensive support throughout the entire immigration process. Our success rate reflects our commitment to your Canadian dreams.',
                'display_order' => 5,
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(['slug' => $service['slug']], $service);
        }
    }
}
