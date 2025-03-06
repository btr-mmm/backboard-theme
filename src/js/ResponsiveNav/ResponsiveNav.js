export class ResponsiveNav {
  constructor() {
    const header = document.querySelector('header');

    this.toggleButton = header.querySelector('button.nav-toggle');
    this.nav = header.querySelector('nav');

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
    } else {
      this.toggleButton.style.display = 'block';

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

