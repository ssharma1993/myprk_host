import HomeController from './HomeController'
import NewsletterController from './NewsletterController'
import QRCodeController from './QRCodeController'
import ServiceController from './ServiceController'
import GalleryController from './GalleryController'
import SponsorController from './SponsorController'
import Settings from './Settings'

const Controllers = {
    HomeController: Object.assign(HomeController, HomeController),
    NewsletterController: Object.assign(NewsletterController, NewsletterController),
    QRCodeController: Object.assign(QRCodeController, QRCodeController),
    ServiceController: Object.assign(ServiceController, ServiceController),
    GalleryController: Object.assign(GalleryController, GalleryController),
    SponsorController: Object.assign(SponsorController, SponsorController),
    Settings: Object.assign(Settings, Settings),
}

export default Controllers