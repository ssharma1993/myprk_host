import Footer from '@/components/client/footer';
import Header from '@/components/client/header';
import Preloader from '@/components/client/preloader';
import { Head } from '@inertiajs/react';
import { ReactNode, useEffect, useState } from 'react';

interface AppLayoutProps {
    children: ReactNode;
    title?: string;
}

export default function AppLayout({
    children,
    title = 'Home',
}: AppLayoutProps) {
    const [showPreloader, setShowPreloader] = useState(true);

    useEffect(() => {
        const timer = setTimeout(() => {
            setShowPreloader(false);
        }, 600);
        return () => clearTimeout(timer);
    }, []);

    return (
        <>
            <Head title={title}>
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
