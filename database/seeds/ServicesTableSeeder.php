<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            /*
            |--------------------------------------------------------------------------
            | VPS
            |--------------------------------------------------------------------------
            */
            [
                'name'              => 'Cloud VPS',
                'slug'              => 'vps',
                'short_description' => 'Create an instance and launch your VPS in minutes. We provide you with improved efficiency, reduced costs and streamlined support.',
                'description'       => '<img src="http://www.adminclub.com/wp-content/uploads/2014/01/CloudHosting.jpg" style="width: 576.6064356435643px; float: right; height: 281px;"><h2 style="margin: 0px 0px 6px; font-family: \'Open Sans\', sans-serif; font-weight: 700; line-height: 36px; color: rgb(84, 84, 84); text-rendering: optimizelegibility; padding: 0px; word-wrap: break-word;">VPS Hosting</h2><p style="margin-bottom: 21px; font-family: \'Open Sans\', sans-serif; font-size: 14px; line-height: 21px; padding: 0px; color: rgb(84, 84, 84); word-wrap: break-word; letter-spacing: normal;">Cloud VPS to meet you On-Demand infrastructure needs.<br></p><ul style="padding: 0px 0px 0px 20px; margin: 21px 0px; color: rgb(84, 84, 84); font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 14px;"><li style="line-height: 21px; font-family: \'Open Sans\', sans-serif; margin: 0px 0px 5px; padding: 0px; color: inherit; word-wrap: break-word;" class="ms-hover">Select from range of choice</li><li style="line-height: 21px; font-family: \'Open Sans\', sans-serif; margin: 0px 0px 5px; padding: 0px; color: inherit; word-wrap: break-word;" class="ms-hover">Deploy in minutes</li><li style="line-height: 21px; font-family: \'Open Sans\', sans-serif; margin: 0px 0px 5px; padding: 0px; color: inherit; word-wrap: break-word;" class="ms-hover">Get started with your work instantly</li><li style="line-height: 21px; font-family: \'Open Sans\', sans-serif; margin: 0px 0px 5px; padding: 0px; color: inherit; word-wrap: break-word;" class="ms-hover"><span style="color: inherit;">Guaranteed Uptime</span></li><li style="line-height: 21px; font-family: \'Open Sans\', sans-serif; margin: 0px 0px 5px; padding: 0px; color: inherit; word-wrap: break-word;" class="ms-hover"><span style="color: inherit;">Security</span></li><li style="line-height: 21px; font-family: \'Open Sans\', sans-serif; margin: 0px 0px 5px; padding: 0px; color: inherit; word-wrap: break-word;" class="ms-hover"><span style="color: inherit;">Monitoring and Management</span></li><li style="line-height: 21px; font-family: \'Open Sans\', sans-serif; margin: 0px 0px 5px; padding: 0px; color: inherit; word-wrap: break-word;" class="ms-hover"><span style="color: inherit;">Private Networks</span></li><li style="line-height: 21px; font-family: \'Open Sans\', sans-serif; margin: 0px 0px 5px; padding: 0px; color: inherit; word-wrap: break-word;" class="ms-hover"><span style="color: inherit;">VPNs</span></li></ul><p style="margin-bottom: 21px; font-family: \'Open Sans\', sans-serif; font-size: 14px; line-height: 21px; padding: 0px; color: rgb(84, 84, 84); word-wrap: break-word; letter-spacing: normal;">Moving your IT to the cloud enables you to improve efficiency, reduce cost and streamline support. AW Cloud helps reduce your carbon footprint. Consolidate your IT resources into AW Managed Cloud.</p><div><br></div>',
                'view'              => 'service.show',
                'order'             => 0,
                'is_published'      => true,
                'created_at'        => \Carbon\Carbon::now(),
                'updated_at'        => \Carbon\Carbon::now()
            ],
            /*
            |--------------------------------------------------------------------------
            | Web
            |--------------------------------------------------------------------------
            */
            [
                'name'              => 'Web Hosting',
                'slug'              => 'web',
                'short_description' => 'Host your website in Nepal. Your website loads faster and your visitors get improved experience. Simple, quick and easy.',
                'description'       => '<img src="https://www.inmorocco.com/assets1.2/images/hebergement-web.png" style="text-align: justify; width: 284px; float: right; height: 284px;"><p style="text-align: justify; margin-bottom: 21px; font-family: \'Open Sans\', sans-serif; font-size: 14px; line-height: 21px; padding: 0px; color: rgb(84, 84, 84); word-wrap: break-word; letter-spacing: normal;">Your business website is more than just a flexible and affordable way to promote your business. It’s a portal to your organization for potential customers and partners, driving visitors from search engines and directories to your space.</p><p style="text-align: justify; margin-bottom: 21px; font-family: \'Open Sans\', sans-serif; font-size: 14px; line-height: 21px; padding: 0px; color: rgb(84, 84, 84); word-wrap: break-word; letter-spacing: normal;">We offer several platforms to suit your business need with an unmatched back-end infrastructure. Our team of experts study your needs and understand your requirement to develop a modern and effective web presence.</p><p style="text-align: justify; margin-bottom: 21px; font-family: \'Open Sans\', sans-serif; font-size: 14px; line-height: 21px; padding: 0px; color: rgb(84, 84, 84); word-wrap: break-word; letter-spacing: normal;">Not all websites are created equal, so we customize platforms to deliver the right solution your business demands. With responsive designs, CSS, AJAX and optimization, we offer brilliant designs coupled with great architecture.</p><ul style="padding: 0px 0px 0px 20px; margin: 21px 0px; color: rgb(84, 84, 84); font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 14px;"><li style="text-align: justify; line-height: 21px; font-family: \'Open Sans\', sans-serif; margin: 0px 0px 5px; padding: 0px; color: inherit; word-wrap: break-word;" class="ms-hover">AWT offers web hosting and e-commerce hosting solutions so you can easily design and promote your website and sell online.</li><li style="text-align: justify; line-height: 21px; font-family: \'Open Sans\', sans-serif; margin: 0px 0px 5px; padding: 0px; color: inherit; word-wrap: break-word;" class="ms-hover">Web hosting for businesses, a professional website that includes tools to help with online marketing, attracting new customers, and so on.</li><li style="text-align: justify; line-height: 21px; font-family: \'Open Sans\', sans-serif; margin: 0px 0px 5px; padding: 0px; color: inherit; word-wrap: break-word;" class="ms-hover">E-commerce web hosting for businesses that allows customers to make purchases online at their convenience, 24x7x365.</li></ul>',
                'view'              => 'service.show',
                'order'             => 1,
                'is_published'      => true,
                'created_at'        => \Carbon\Carbon::now(),
                'updated_at'        => \Carbon\Carbon::now()
            ],
            /*
            |--------------------------------------------------------------------------
            | Email
            |--------------------------------------------------------------------------
            */
            [
                'name'              => 'Enterprise Secure Email',
                'slug'              => 'email',
                'short_description' => 'Secure email service for all your staff. Unlimited mailboxes, flexible storage, encrypted transmission and great support.',
                'description'       => '<img src="http://whiteballcs.co.za/pics/email-hosting.png" style="width: 479.65625px; float: right; height: 275.61012638717636px;"><p style="margin-bottom: 21px; font-family: \'Open Sans\', sans-serif; font-size: 14px; line-height: 21px; padding: 0px; color: rgb(84, 84, 84); word-wrap: break-word; letter-spacing: normal;">The importance of email for a modern enterprise is tremendous. What we offer is a managed, secure email service that you can rely on doing your business with.</p><p style="margin-bottom: 21px; font-family: \'Open Sans\', sans-serif; font-size: 14px; line-height: 21px; padding: 0px; color: rgb(84, 84, 84); word-wrap: break-word; letter-spacing: normal;">We provide flexible storage so that you don’t have to worry about disk quota. To make it easy, our offerings provide you unlimited mailboxes. You can start with basic storage option and increase it when you approach the allotted space. No need to delete your emails to make space for new ones, we just increase your storage size on the go.</p><p style="text-align: justify; margin-bottom: 21px; font-family: \'Open Sans\', sans-serif; font-size: 14px; line-height: 21px; padding: 0px; color: rgb(84, 84, 84); word-wrap: break-word; letter-spacing: normal;">We take care of protecting you from Virus, Spam, Malware and other online threats so that you don’t have to spend time on managing your emails and instead focus your time on your work. We provide secure email transmission to your devices, be it a mobile phone, tablet, laptop or your work desktop. We also provide a very intutive interface over the web. No matter where you are or which device you use, you always have access to your emails.</p>',
                'view'              => 'service.show',
                'order'             => 2,
                'is_published'      => true,
                'created_at'        => \Carbon\Carbon::now(),
                'updated_at'        => \Carbon\Carbon::now()
            ],
            /*
            |--------------------------------------------------------------------------
            | Endpoint Security
            |--------------------------------------------------------------------------
            */
            [
                'name'              => 'Endpoint Security',
                'slug'              => 'endpoint-security',
                'short_description' => '',
                'description'       => '',
                'view'              => 'service.show',
                'order'             => 3,
                'is_published'      => true,
                'created_at'        => \Carbon\Carbon::now(),
                'updated_at'        => \Carbon\Carbon::now()
            ],
            /*
            |--------------------------------------------------------------------------
            | Domain
            |--------------------------------------------------------------------------
            */
            [
                'name'              => 'Domain',
                'slug'              => 'domain',
                'short_description' => 'Domain registration is the process of registering a domain name, which identifies one or more IP addresses with a name that is easier to remember and use in URLs to identify particular Web pages.',
                'description'       => '<h2><span style="font-weight: bold;">Most Popular TLDs</span></h2><h2><span style="color: rgb(57, 132, 198);">.com&nbsp; &nbsp; .net&nbsp; &nbsp; .org&nbsp; &nbsp; .ngo&nbsp; &nbsp; .info &nbsp;.biz &nbsp;.online</span></h2>',
                'view'              => 'service.show',
                'order'             => 4,
                'is_published'      => true,
                'created_at'        => \Carbon\Carbon::now(),
                'updated_at'        => \Carbon\Carbon::now()
            ],
            /*
            |--------------------------------------------------------------------------
            | SSL Certificate
            |--------------------------------------------------------------------------
            */
            [
                'name'              => 'SSL Certificate',
                'slug'              => 'ssl-certificate',
                'short_description' => 'SSL stands for Secure Sockets Layer, its a technology that enables encryption between web server and web browser.',
                'description'       => '<p><span style="font-family: \'Helvetica Neue\';">It is utilized by millions of online businesses and individuals to decrease the risk of sensitive information (e.g., credit card numbers, usernames, passwords, emails, etc.) from being stolen or tampered with by hackers and identity thieves. In essence, SSL allows for a private “conversation” just between the two intended parties.</span></p><p><span style="font-family: \'Helvetica Neue\';">To create this secure connection, an&nbsp;SSL certificate&nbsp;(also referred to as a “digital certificate”) is installed on a web server and serves two functions:&nbsp;&nbsp;&nbsp;&nbsp;</span></p><ul><li style="margin: 0px; line-height: 1.5;" class="ms-hover"><span style="font-family: \'Helvetica Neue\';">It authenticates the identity of the website (this guarantees visitors that they’re not on a bogus site)</span></li></ul><ul><li style="margin: 0px; line-height: 1.5;" class="ms-hover"><span style="font-family: \'Helvetica Neue\';">It encrypts the data that’s being transmitted</span></li></ul><p></p><p style="box-sizing: inherit; margin-bottom: 24px; line-height: 1.5;"></p>',
                'view'              => 'service.show',
                'order'             => 5,
                'is_published'      => true,
                'created_at'        => \Carbon\Carbon::now(),
                'updated_at'        => \Carbon\Carbon::now()
            ],
            /*
            |--------------------------------------------------------------------------
            | Co Location
            |--------------------------------------------------------------------------
            */
            [
                'name'              => 'Co-Location',
                'slug'              => 'co-location',
                'short_description' => 'AWT, with its state-of-art data centers, has become one of the most advanced Co-location service provider in the country.',
                'description'       => '<p><span style="color: rgb(84, 84, 84); font-family: \'Open Sans\', sans-serif; font-size: 14px;">Co-location of IT infrastructure is an investment in keeping the company alive in the event of a severe outage. It’s an insurance policy, and like any other insurance, you pay upfront so that you don’t suffer severe losses later. Significant equipment failure, fire and earthquakes are just some of the disasters that can occur with little or no warning. They’re all facts of life, though we wish they weren’t, and their consequences can be devastating. Most businesses today are heavily automated and damage to equipment or data can not only disrupt business continuity and inflict financial losses but also threaten the very survival of a company.</span><br style="color: rgb(84, 84, 84); font-family: \'Open Sans\', sans-serif; font-size: 14px;"><span style="color: rgb(84, 84, 84); font-family: \'Open Sans\', sans-serif; font-size: 14px;">AWT, with its state-of-art data centers, has become one of the most advanced Colocation service provider in the country. You can have ultimate peace of mind with AWT Colocation housed in a highly secure data center by placing your data and equipment within its facilities and feel safe as the AWT Colocation has a 99.95% Up-time Guarantee. Co-locating with us ensures that your IT infrastructure and critical applications will be housed in the highest quality data center facility. As a colocation specialist, we supply the security, connectivity, electricity, air conditioning,</span><br style="color: rgb(84, 84, 84); font-family: \'Open Sans\', sans-serif; font-size: 14px;"><span style="color: rgb(84, 84, 84); font-family: \'Open Sans\', sans-serif; font-size: 14px;">fire suppression and backup power. We supply 24 x 7 x 365 engineering resource to ensure that we maintain our guaranteed uptime record. Our data center provides your organization with a highly secure environment for all your needs.</span></p><p><span style="color: rgb(84, 84, 84); font-family: \'Open Sans\', sans-serif; font-size: 14px;"><br></span></p><h3 style="margin: 0px 0px 9px; font-family: \'Open Sans\', sans-serif; font-weight: 700; line-height: 33px; color: rgb(84, 84, 84); text-rendering: optimizelegibility; font-size: 22px; padding: 0px; word-wrap: break-word;">AWT Co-location Service Features:</h3><p style="margin-bottom: 21px; font-family: \'Open Sans\', sans-serif; font-size: 14px; line-height: 21px; padding: 0px; color: rgb(84, 84, 84); word-wrap: break-word; letter-spacing: normal;">• N+1 UPS redundancy.<br>• Multiple Diesel Generator backup.<br>• Fully-redundant and conditioned power, mechanical systems &amp; electrical distribution, and &nbsp;comprehensive&nbsp;suppression with fully controlled physical and logical access.<br>• On-site 24×7 support provides quick request responses at any conditions.<br>• High-availability network and system environment with access to high speed local network.<br>• Multiple levels of electrical and mechanical redundancy protects the system during any event.<br>• Static transfer switches to protect power load during emergencies.<br>• 100% power availability Service Level Agreement (SLA).<br>• Connectivity options with access to high speed local and international network.<br>• Interconnectivity between multiple service providers.<br>• Multiple, diverse carriers available.<br>• Connected to NPIX with high speed local network.</p>',
                'view'              => 'service.show',
                'order'             => 6,
                'is_published'      => true,
                'created_at'        => \Carbon\Carbon::now(),
                'updated_at'        => \Carbon\Carbon::now()
            ]
        ];
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('services')->truncate();

        DB::table('services')->insert($services);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
