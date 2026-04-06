import { NavFooter } from '@/components/nav-footer';
import { NavMain } from '@/components/nav-main';
import { NavUser } from '@/components/nav-user';
import {
    Sidebar,
    SidebarContent,
    SidebarFooter,
    SidebarHeader,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
} from '@/components/ui/sidebar';
import { dashboard } from '@/routes';
import { type NavItem } from '@/types';
import { Link } from '@inertiajs/react';
import {
    BookOpen,
    FileText,
    Folder,
    LayoutGrid,
    LayoutList,
    LayoutPanelLeft,
    Link as LinkIcon,
    MapPin,
    SearchCheck,
    Server,
    Zap,
} from 'lucide-react';
import AppLogo from './app-logo';

const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        href: dashboard(),
        icon: LayoutGrid,
    },
    {
        title: 'Services',
        href: '/services',
        icon: LayoutList,
    },
    {
        title: 'Gallery',
        href: '/admin/gallery',
        icon: LayoutPanelLeft,
    },
    {
        title: 'Sponsors',
        href: '/admin/sponsors',
        icon: LayoutPanelLeft,
    },
    {
        title: 'Newsletter',
        href: '/admin/newsletter',
        icon: LayoutPanelLeft,
    },
    {
        title: 'SEO',
        href: '/admin/seo',
        icon: SearchCheck,
    },
    {
        title: 'Social Links',
        href: '/admin/social-links',
        icon: LinkIcon,
    },
    {
        title: 'Office Locations',
        href: '/admin/office-locations',
        icon: MapPin,
    },
    {
        title: 'Queue Health',
        href: '/queue-health',
        icon: Server,
    },
    {
        title: 'Logs',
        href: '/logs',
        icon: FileText,
    },
    {
        title: 'Cache',
        href: '/admin/cache',
        icon: Zap,
    },
];

const footerNavItems: NavItem[] = [
    {
        title: 'Repository',
        href: 'https://github.com/laravel/react-starter-kit',
        icon: Folder,
    },
    {
        title: 'Documentation',
        href: 'https://laravel.com/docs/starter-kits#react',
        icon: BookOpen,
    },
];

export function AppSidebar() {
    return (
        <Sidebar collapsible="icon" variant="inset">
            <SidebarHeader>
                <SidebarMenu>
                    <SidebarMenuItem>
                        <SidebarMenuButton size="lg" asChild>
                            <Link href={dashboard()} prefetch>
                                <AppLogo />
                            </Link>
                        </SidebarMenuButton>
                    </SidebarMenuItem>
                </SidebarMenu>
            </SidebarHeader>

            <SidebarContent>
                <NavMain items={mainNavItems} />
            </SidebarContent>

            <SidebarFooter>
                <NavFooter items={footerNavItems} className="mt-auto" />
                <NavUser />
            </SidebarFooter>
        </Sidebar>
    );
}
