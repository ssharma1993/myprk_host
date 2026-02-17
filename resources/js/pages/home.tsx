import PublicLayout from '@/layouts/public-layout';
import { Head } from '@inertiajs/react';
import { useEffect } from 'react';

export default function Home() {
    const assetBase = '/client/assets';

    useEffect(() => {
        // Wait for jQuery and plugins to be loaded
        const initializePlugins = () => {
            const $ = (window as any).$;
            const AOS = (window as any).AOS;
            const visanet = (window as any).visanet;

            if (!$) {
                // Retry if jQuery is not loaded yet
                setTimeout(initializePlugins, 500);
                return;
            }

            // Initialize Slick Carousel
            const carousel = document.querySelector(
                '.hero-slider-two__carousel',
            );
            if (carousel && $.fn.slick) {
                if (!$(carousel).hasClass('slick-initialized')) {
                    try {
                        $(carousel).slick({
                            autoplay: true,
                            autoplaySpeed: 5000,
                            arrows: false,
                            dots: true,
                            fade: true,
                            speed: 800,
                        });
                    } catch (error) {
                        console.error('Slick initialization error:', error);
                    }
                }
            }

            // Initialize Sticky Header
            if ($.fn.stickyHeader) {
                try {
                    $('.sticky-header').stickyHeader();
                } catch (error) {
                    console.error('Sticky header initialization error:', error);
                }
            }

            // Initialize AOS (Animate On Scroll)
            if (AOS) {
                try {
                    AOS.refresh();
                } catch (error) {
                    console.error('AOS initialization error:', error);
                }
            }

            // Trigger any remaining visanet.js initializations
            if (visanet && typeof visanet.init === 'function') {
                try {
                    visanet.init();
                } catch (error) {
                    console.error('Visanet initialization error:', error);
                }
            }
        };

        // Wait for page to fully load before initializing
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () => {
                setTimeout(initializePlugins, 1500);
            });
        } else {
            // DOM is already loaded
            setTimeout(initializePlugins, 1500);
        }
    }, []);

    return (
        <>
            <Head title="Home" />
            <PublicLayout title="Home">
                {/* Hero Slider */}
                <section className="hero-slider-two">
                    <div className="hero-slider-two__carousel">
                        {[1, 2, 3].map((item) => (
                            <div key={item} className="hero-slider-two__item">
                                <div
                                    className="hero-slider-two__bg-1"
                                    style={{
                                        backgroundImage: `url(${assetBase}/images/shapes/hero-slider-bg-shape-2-1.png)`,
                                    }}
                                >
                                    <img
                                        src={`${assetBase}/images/shapes/hero-slider-shape-2-1.png`}
                                        alt="shape"
                                        className="hero-slider-two__shape-1"
                                    />
                                </div>
                                <div className="hero-slider-two__bg-2">
                                    <div
                                        className="hero-slider-two__bg-2__inner"
                                        style={{
                                            backgroundImage: `url(${assetBase}/images/backgrounds/hero-slider-bg-2-${item}.jpg)`,
                                        }}
                                    />
                                    <img
                                        src={`${assetBase}/images/shapes/hero-slider-shape-2-3.png`}
                                        alt="shape"
                                        className="hero-slider-two__shape-2"
                                    />
                                    <img
                                        src={`${assetBase}/images/shapes/hero-slider-shape-2-4.png`}
                                        alt="shape"
                                        className="hero-slider-two__shape-3"
                                    />
                                    <img
                                        src={`${assetBase}/images/shapes/hero-slider-shape-2-5.png`}
                                        alt="shape"
                                        className="hero-slider-two__shape-4"
                                    />
                                </div>
                                <div className="container">
                                    <div className="row">
                                        <div className="col-xl-7 col-lg-10">
                                            <div className="hero-slider-two__content">
                                                <h2 className="hero-slider-two__title">
                                                    {item === 1
                                                        ? 'Best Solution For '
                                                        : 'PRK Immigration '}
                                                    <br />
                                                    <span className="hero-slider-two__title__group">
                                                        <span className="hero-slider-two__title__shape-1">
                                                            <img
                                                                src={`${assetBase}/images/shapes/hero-slider-shape-2-2.png`}
                                                                alt="shape"
                                                            />
                                                        </span>
                                                        <span className="hero-slider-two__title__shape-2" />
                                                        <span className="hero-slider-two__title__highlight">
                                                            Visa
                                                        </span>
                                                    </span>
                                                    {item === 1
                                                        ? 'Processing Immigration'
                                                        : 'Consulting'}
                                                </h2>
                                                <div className="hero-slider-two__description">
                                                    <p className="hero-slider-two__text">
                                                        {item === 1
                                                            ? 'Business visa is a conditional permission provided by a region to a foreigner to enter, stay in, or leave that country.'
                                                            : 'There are many variations of passages of Lorem Ipsum available.'}
                                                    </p>
                                                </div>
                                                <div className="hero-slider-two__button">
                                                    <a
                                                        href="/about"
                                                        className="visanet-btn visanet-btn--black"
                                                    >
                                                        <span className="visanet-btn__icon-box">
                                                            <span className="visanet-btn__icon">
                                                                <i className="icon-arrow-right-3" />
                                                            </span>
                                                        </span>
                                                        <span className="visanet-btn__text">
                                                            Discover More
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ))}
                    </div>
                </section>

                {/* Features Section */}
                <section className="features">
                    <div className="container">
                        <div className="sec-title sec-title--center">
                            <h2 className="sec-title__title">WHY CHOOSE US?</h2>
                        </div>
                        <div className="row gutter-y-30">
                            {[
                                {
                                    title: 'Passport Application',
                                    icon: 'icon-passport',
                                    img: 'features-1-1.jpg',
                                },
                                {
                                    title: 'Quick Visa Processing',
                                    icon: 'icon-visa-processing',
                                    img: 'features-1-2.jpg',
                                },
                                {
                                    title: 'Support Team Solution',
                                    icon: 'icon-support',
                                    img: 'features-1-3.jpg',
                                },
                            ].map((feature) => (
                                <div
                                    key={feature.title}
                                    className="col-xl-4 col-md-6"
                                >
                                    <div className="features__card">
                                        <div className="features__image">
                                            <img
                                                src={`${assetBase}/images/resources/${feature.img}`}
                                                alt="features"
                                            />
                                        </div>
                                        <div className="features__content">
                                            <div className="features__icon-box">
                                                <span className="features__icon">
                                                    <i
                                                        className={feature.icon}
                                                    />
                                                </span>
                                            </div>
                                            <h2 className="features__title">
                                                <a href="/about">
                                                    {feature.title}
                                                </a>
                                            </h2>
                                            <p className="features__text">
                                                Immigration tailored visa
                                                management this randomised words
                                                which do services solution sed
                                                do majority.
                                            </p>
                                            <a
                                                href="/about"
                                                className="features__btn"
                                            >
                                                Read More{' '}
                                                <span className="features__btn__icon">
                                                    <i className="icon-arrow-right-up" />
                                                </span>
                                            </a>
                                        </div>
                                        <img
                                            src={`${assetBase}/images/shapes/features-shape-1-1.png`}
                                            alt="shape"
                                            className="features__shape"
                                        />
                                    </div>
                                </div>
                            ))}
                        </div>
                    </div>
                </section>

                {/* Fun Facts Section */}
                <section className="funfact section-space-b">
                    <div className="container">
                        <div className="row gutter-y-30">
                            {[
                                {
                                    count: '285',
                                    label: 'Successful client collaborations',
                                    icon: 'icon-satisfaction',
                                },
                                {
                                    count: '83',
                                    label: 'Countries visa Represented',
                                    icon: 'icon-place',
                                },
                                {
                                    count: '195',
                                    label: 'Experience officer immigration',
                                    icon: 'icon-immigration-officer',
                                },
                                {
                                    count: '366',
                                    label: 'Perfect record visa approval',
                                    icon: 'icon-completed-task',
                                },
                            ].map((fact, idx) => (
                                <div key={idx} className="col-lg-3 col-sm-6">
                                    <div className="funfact__item">
                                        <div className="funfact__item__content">
                                            <div className="funfact__item__icon-box">
                                                <span className="funfact__item__icon">
                                                    <i className={fact.icon} />
                                                </span>
                                            </div>
                                            <h3 className="funfact__item__count">
                                                <span>{fact.count}</span>k+
                                            </h3>
                                            <p className="funfact__item__title">
                                                {fact.label}
                                            </p>
                                        </div>
                                        <div className="funfact__item__bg">
                                            <div
                                                style={{
                                                    backgroundImage: `url(${assetBase}/images/shapes/funfact-shape-1-1-.png)`,
                                                }}
                                                className="funfact__item__shape"
                                            />
                                            <div
                                                style={{
                                                    backgroundImage: `url(${assetBase}/images/resources/funfact-item-bg-1-1.jpg)`,
                                                }}
                                                className="funfact__item__image"
                                            />
                                        </div>
                                    </div>
                                </div>
                            ))}
                        </div>
                    </div>
                </section>

                {/* Call to Action Section */}
                <section className="fly-one section-space-t">
                    <div
                        className="fly-one__bg"
                        style={{
                            backgroundImage: `url(${assetBase}/images/backgrounds/fly-bg.jpg)`,
                        }}
                    />
                    <div className="container">
                        <div className="fly-one__content">
                            <div className="fly-one__client">
                                <div className="fly-one__client__images">
                                    <div className="fly-one__client__img">
                                        <img
                                            src={`${assetBase}/images/resources/fly-client-1.png`}
                                            alt="Trusted Customer"
                                        />
                                    </div>
                                    <div className="fly-one__client__img">
                                        <img
                                            src={`${assetBase}/images/resources/fly-client-2.png`}
                                            alt="Trusted Customer"
                                        />
                                    </div>
                                    <div className="fly-one__client__img">
                                        <img
                                            src={`${assetBase}/images/resources/fly-client-3.png`}
                                            alt="Trusted Customer"
                                        />
                                    </div>
                                </div>
                                <h3 className="fly-one__client__funfact">
                                    <span>10</span>M+
                                </h3>
                                <h4 className="fly-one__client__title">
                                    Trusted Customer
                                </h4>
                            </div>
                            <div className="fly-one__card">
                                <div className="fly-one__card__inner">
                                    <h3 className="fly-one__card__title">
                                        Ready to fly with us your dream country.
                                    </h3>
                                    <p className="fly-one__card__text">
                                        Immigration visa design support this
                                        services business agency elit, sed to do
                                        eiusmod tempor majority have humour visa
                                        solution.
                                    </p>
                                    <a href="/about" className="visanet-btn">
                                        <span className="visanet-btn__icon-box">
                                            <span className="visanet-btn__icon">
                                                <i className="icon-arrow-right-3" />
                                            </span>
                                        </span>
                                        <span className="visanet-btn__text">
                                            Read More
                                        </span>
                                    </a>
                                </div>
                                <div className="fly-one__card__image">
                                    <img
                                        src={`${assetBase}/images/resources/fly-img.jpg`}
                                        alt="fly image"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                    <img
                        src={`${assetBase}/images/shapes/fly-shape-1-1.png`}
                        alt="fly shape"
                        className="fly-one__shape-1 airplane-animated"
                    />
                    <div className="fly-one__shape-2" />
                </section>
            </PublicLayout>
        </>
    );
}
