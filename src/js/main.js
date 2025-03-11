import { DotNav } from './DotNav/DotNav';
import { HeroPopIn } from './HeroPopin/HeroPopIn';
import { ResponsiveNav } from './ResponsiveNav/ResponsiveNav';

if (document.querySelector('main#scroll-container')) {
  const dotnav = new DotNav();
}

if (document.querySelector('header')) {
  const responsiveNav = new ResponsiveNav();
}

if (document.querySelector('section.hero')) {
  const heroPopIn = new HeroPopIn();
}

