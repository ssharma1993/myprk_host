import Footer from '@/components/client/footer';
import Header from '@/components/client/header';
import Preloader from '@/components/client/preloader';
import { Head } from '@inertiajs/react';
import { ReactNode, useEffect, useState } from 'react';

interface PublicLayoutProps {
    children: ReactNode;
    title?: string;
}

export default function PublicLayout({
    children,
    title = 'Home',
}: PublicLayoutProps) {
    const [showPreloader, setShowPreloader] = useState(true);

    useEffect(() => {
        const timer = setTimeout(() => {
            setShowPreloader(false);
        }, 800);
        return () => clearTimeout(timer);
    }, []);

    return (
        <>
            <Head title={title}>
                <meta charSet="UTF-8" />
                <meta
                    name="viewport"
                    content="width=device-width, initial-scale=1.0"
                />
                <link rel="preconnect" href="https://fonts.googleapis.com" />
                <link
                    rel="preconnect"
                    href="https://fonts.gstatic.com"
                    crossOrigin="anonymous"
                />
                <link
                    href="https://fonts.googleapis.com/css2?family=Red+Hat+Text:ital,wght@0,300..700;1,300..700&display=swap"
                    rel="stylesheet"
                />
                <link
                    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
                    rel="stylesheet"
                />
                <link
                    rel="stylesheet"
                    href="/client/assets/vendors/bootstrap/css/bootstrap.min.css"
                />
                <link
                    rel="stylesheet"
                    href="/client/assets/vendors/bootstrap-select/bootstrap-select.min.css"
                />
                <link
                    rel="stylesheet"
                    href="/client/assets/vendors/aos/css/aos.css"
                />
                <link
                    rel="stylesheet"
                    href="/client/assets/vendors/fontawesome/css/all.min.css"
                />
                <link
                    rel="stylesheet"
                    href="/client/assets/vendors/jquery-ui/jquery-ui.css"
                />
                <link
                    rel="stylesheet"
                    href="/client/assets/vendors/jarallax/jarallax.css"
                />
                <link
                    rel="stylesheet"
                    href="/client/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css"
                />
                <link
                    rel="stylesheet"
                    href="/client/assets/vendors/visanet-icons/style.css"
                />
                <link
                    rel="stylesheet"
                    href="/client/assets/vendors/daterangepicker-master/daterangepicker.css"
                />
                <link
                    rel="stylesheet"
                    href="/client/assets/vendors/slick/slick.css"
                />
                <link
                    rel="stylesheet"
                    href="/client/assets/vendors/owl-carousel/css/owl.carousel.min.css"
                />
                <link
                    rel="stylesheet"
                    href="/client/assets/vendors/owl-carousel/css/owl.theme.default.min.css"
                />
                <link
                    href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
                    rel="stylesheet"
                />
                <link rel="stylesheet" href="/client/assets/css/visanet.css" />
                <script
                    src="/client/assets/vendors/jquery/jquery-3.7.1.min.js"
                    defer
                />
                <script
                    src="/client/assets/vendors/bootstrap/js/bootstrap.bundle.min.js"
                    defer
                />
                <script
                    src="/client/assets/vendors/bootstrap-select/bootstrap-select.min.js"
                    defer
                />
                <script
                    src="/client/assets/vendors/jarallax/jarallax.min.js"
                    defer
                />
                <script
                    src="/client/assets/vendors/jquery-ui/jquery-ui.js"
                    defer
                />
                <script
                    src="/client/assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js"
                    defer
                />
                <script
                    src="/client/assets/vendors/jquery-appear/jquery.appear.min.js"
                    defer
                />
                <script
                    src="/client/assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js"
                    defer
                />
                <script
                    src="/client/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js"
                    defer
                />
                <script
                    src="/client/assets/vendors/jquery-validate/jquery.validate.min.js"
                    defer
                />
                <script src="/client/assets/vendors/wnumb/wNumb.js" defer />
                <script
                    src="/client/assets/vendors/owl-carousel/js/owl.carousel.min.js"
                    defer
                />
                <script src="/client/assets/vendors/aos/js/aos.js" defer />
                <script
                    src="/client/assets/vendors/imagesloaded/imagesloaded.min.js"
                    defer
                />
                <script src="/client/assets/vendors/isotope/isotope.js" defer />
                <script src="/client/assets/vendors/slick/slick.min.js" defer />
                <script
                    src="/client/assets/vendors/countdown/countdown.min.js"
                    defer
                />
                <script
                    src="/client/assets/vendors/daterangepicker-master/moment.min.js"
                    defer
                />
                <script
                    src="/client/assets/vendors/daterangepicker-master/daterangepicker.js"
                    defer
                />
                <script src="/client/assets/vendors/gsap/gsap.js" defer />
                <script
                    src="/client/assets/vendors/gsap/scrolltrigger.min.js"
                    defer
                />
                <script
                    src="/client/assets/vendors/gsap/splittext.min.js"
                    defer
                />
                <script
                    src="/client/assets/vendors/gsap/visanet-split.js"
                    defer
                />
                <script src="/client/assets/js/visanet.js" defer />
            </Head>
            {showPreloader && <Preloader />}
            <Header />
            <div className="page-wrapper">
                {children}
                <Footer />
            </div>
        </>
    );
}
