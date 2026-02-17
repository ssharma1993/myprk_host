import { COMPANY_INFO } from '@/config/company';

export default function Footer() {
    const assetBase = '/client/assets';
    const currentYear = new Date().getFullYear();

    return (
        <footer className="main-footer main-footer--two">
            <div className="main-footer__bg" />
            <div className="container">
                <div className="row gutter-y-40">
                    <div className="col-xl-3 col-lg-5 col-md-7">
                        <div className="footer-widget footer-widget--about">
                            <a
                                href="/"
                                className="footer-widget__logo logo-retina"
                            >
                                <img
                                    src={`${assetBase}/images/logo.svg`}
                                    width="230"
                                    alt="PRK Immigration"
                                />
                            </a>
                            <p className="footer-widget__text">
                                PRK Immigration visa consulting agencies, study
                                abroad consultants, visa agents, and travel or
                                overseas job services.
                            </p>
                            <div className="social-links">
                                <a href="https://facebook.com">
                                    <span className="social-links__icon">
                                        <i className="fab fa-facebook-f" />
                                        <span className="sr-only">
                                            Facebook
                                        </span>
                                    </span>
                                </a>
                                <a href="https://x.com">
                                    <span className="social-links__icon">
                                        <i className="fab fa-twitter" />
                                        <span className="sr-only">X</span>
                                    </span>
                                </a>
                                <a href="https://linkedin.com">
                                    <span className="social-links__icon">
                                        <i className="fab fa-linkedin-in" />
                                        <span className="sr-only">
                                            Linkedin
                                        </span>
                                    </span>
                                </a>
                                <a href="https://instagram.com">
                                    <span className="social-links__icon">
                                        <i className="fab fa-instagram" />
                                        <span className="sr-only">
                                            Instagram
                                        </span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div className="col-lg-3 col-md-5 col-sm-6">
                        <div className="footer-widget footer-widget--links">
                            <h2 className="footer-widget__title">Quick Link</h2>
                            <ul className="list-unstyled footer-widget__links">
                                <li>
                                    <a href="/about">What We Do</a>
                                </li>
                                <li>
                                    <a href="/about">About Company</a>
                                </li>
                                <li>
                                    <a href="team.html">Team Member</a>
                                </li>
                                <li>
                                    <a href="gallery.html">Our Gallery</a>
                                </li>
                                <li>
                                    <a href="/about">Watch Video</a>
                                </li>
                                <li>
                                    <a href="blog-grid-right.html">
                                        Latest news
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div className="main-footer__bottom">
                <div className="container">
                    <div className="main-footer__bottom__inner">
                        <p className="main-footer__copyright">
                            &copy; Copyright {currentYear} by PRK Immigration
                        </p>
                        <ul className="main-footer__page list-unstyled">
                            <li>
                                <a href="/about">Privacy</a>
                            </li>
                            <li>
                                <a href="/about">Policy</a>
                            </li>
                            <li>
                                <a href="/contact">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            {/* Mobile nav and other widgets */}
            <div className="mobile-nav__wrapper">
                <div className="mobile-nav__overlay mobile-nav__toggler" />
                <div className="mobile-nav__content">
                    <span className="mobile-nav__close mobile-nav__toggler">
                        <i className="icon-close" />
                    </span>
                    <div className="logo-box">
                        <a href="/" aria-label="logo image">
                            <img
                                src={`${assetBase}/images/logo.svg`}
                                width="230"
                                alt="PRK Immigration"
                            />
                        </a>
                    </div>
                    <div className="mobile-nav__container" />
                    <ul className="mobile-nav__contact list-unstyled">
                        <li>
                            <span className="mobile-nav__contact__icon">
                                <i className="fa fa-envelope" />
                            </span>
                            <a href={`mailto:${COMPANY_INFO.email}`}>
                                {COMPANY_INFO.email}
                            </a>
                        </li>
                        <li>
                            <span className="mobile-nav__contact__icon">
                                <i className="fa fa-phone-alt" />
                            </span>
                            <a href={COMPANY_INFO.phoneLink}>
                                {COMPANY_INFO.phone}
                            </a>
                        </li>
                    </ul>
                    <div className="social-links">
                        <a href="https://facebook.com">
                            <span className="social-links__icon">
                                <i className="fab fa-facebook-f" />
                            </span>
                        </a>
                        <a href="https://x.com">
                            <span className="social-links__icon">
                                <i className="fab fa-twitter" />
                            </span>
                        </a>
                        <a href="https://linkedin.com">
                            <span className="social-links__icon">
                                <i className="fab fa-linkedin-in" />
                            </span>
                        </a>
                        <a href="https://instagram.com">
                            <span className="social-links__icon">
                                <i className="fab fa-instagram" />
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div className="search-popup">
                <div className="search-popup__overlay search-toggler" />
                <div className="search-popup__content">
                    <form
                        role="search"
                        method="get"
                        className="search-popup__form"
                        action="#"
                    >
                        <input
                            type="text"
                            id="search"
                            placeholder="Search Here..."
                        />
                        <button type="submit" aria-label="search submit">
                            <i className="icon-search" />
                        </button>
                    </form>
                </div>
            </div>
            <a
                href="#"
                data-target="html"
                className="scroll-to-target scroll-to-top"
            >
                <span className="scroll-to-top__text">back top</span>
                <span className="scroll-to-top__wrapper">
                    <span className="scroll-to-top__inner" />
                </span>
            </a>
        </footer>
    );
}
