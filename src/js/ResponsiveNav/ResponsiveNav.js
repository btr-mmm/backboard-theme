import mobileLogo from '../../assets/images/logo-stack-orange.png';
import desktopLogo from '../../assets/images/logo-horiz-orange.png';

export class ResponsiveNav {
  constructor() {
    const header = document.querySelector('header');

    this.toggleButton = header.querySelector('button.nav-toggle');
    this.nav = header.querySelector('nav');

    this.logo = header.querySelector('.logo > img');

    console.log(this.mobileLogoUrl, this.desktopLogoUrl);

    this.navOpen = false;
    this.mobileBreakpoint = 1200;

    this.debounceTimeout = null;
    this.debounceDelay = 100;

    this.init();
  }

  init() {
    this.toggleButton.addEventListener('click', this.toggle.bind(this));

    this.handleResize();

    window.addEventListener('resize', this.debounceResize.bind(this));
  }

  debounceResize() {
    if (this.debounceTimeout) {
      clearTimeout(this.debounceTimeout);
    }

    this.debounceTimeout = setTimeout(() => {
      this.handleResize();
    }, this.debounceDelay);
  }

  handleResize() {
    const windowWidth = window.innerWidth;

    if (windowWidth >= this.mobileBreakpoint) {
      this.nav.style.height = 'auto';
      this.toggleButton.style.display = 'none';
      this.logo.src = desktopLogo;
    } else {
      this.toggleButton.style.display = 'block';
      this.logo.src = mobileLogo;

      if (this.navOpen) {
        this.nav.style.height = 'auto';
        const height = this.nav.scrollHeight;
        this.nav.style.height = height + 'px';
      } else {
        this.nav.style.height = '0';
      }
    }
  }

  toggle() {
    this.navOpen = !this.navOpen;

    if (this.navOpen) {
      this.nav.style.height = 'auto';
      const height = this.nav.scrollHeight;

      this.nav.style.height = '0';

      setTimeout(() => {
        this.nav.style.height = height + 'px';
      }, 10);
    } else {
      this.nav.style.height = '0';
    }
  }
}

