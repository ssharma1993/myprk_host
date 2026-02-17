import { COMPANY_INFO } from '@/config/company';

export default function Header() {
    const assetBase = '/client/assets';

    return (
        <header className="main-header main-header--two sticky-header sticky-header--normal">
            <div className="container">
                <div className="main-header__inner">
                    <div className="main-header__left">
                        <div className="main-header__logo logo-retina">
                            <a href="/">
                                <img
                                    src={`${assetBase}/images/logo.svg`}
                                    alt="PRK Immigration"
                                    width="120"
                                />
                            </a>
                        </div>
                    </div>
                    <div className="main-header__right">
                        <div className="main-header__bottom">
                            <nav className="main-header__nav main-menu">
                                <ul className="main-menu__list">
                                    <li>
                                        <a href="/">Home</a>
                                    </li>
                                    <li>
                                        <a href="/about">About</a>
                                    </li>
                                    <li className="dropdown">
                                        <a href="#">Visa</a>
                                        <ul>
                                            <li>
                                                <a href="visa-d-business-visa.html">
                                                    Business Visa
                                                </a>
                                            </li>
                                            <li>
                                                <a href="visa-d-visa-processing.html">
                                                    Quick Visa Processing
                                                </a>
                                            </li>
                                            <li>
                                                <a href="visa-d-immigration-visa.html">
                                                    Immigration Visa
                                                </a>
                                            </li>
                                            <li>
                                                <a href="visa-d-family-visa.html">
                                                    Family Visa
                                                </a>
                                            </li>
                                            <li>
                                                <a href="visa-d-students-visa.html">
                                                    Students Visa
                                                </a>
                                            </li>
                                            <li>
                                                <a href="visa-d-travel-visa.html">
                                                    Travel Visa
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="/contact">Contact</a>
                                    </li>
                                </ul>
                            </nav>
                            <div className="main-header__right__right">
                                <div className="mobile-nav__btn mobile-nav__toggler">
                                    <span />
                                    <span />
                                    <span />
                                </div>
                                <div className="main-header__call">
                                    <div className="main-header__call__content">
                                        <p className="main-header__call__title">
                                            Book Consultation
                                        </p>
                                        <a
                                            href={COMPANY_INFO.phoneLink}
                                            className="main-header__call__number"
                                        >
                                            {COMPANY_INFO.phone}
                                        </a>
                                        <br />
                                        <a
                                            href={`mailto:${COMPANY_INFO.email}`}
                                            className="main-header__call__email"
                                        >
                                            {COMPANY_INFO.email}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    );
}
