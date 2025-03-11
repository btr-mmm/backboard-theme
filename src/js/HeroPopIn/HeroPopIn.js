export class HeroPopIn {
  constructor(options = {}) {
    this.heroSelector = options.heroSelector || 'section.hero';
    this.revealDelay = options.revealDelay || 1000;
    this.mobileRevealDelay = options.mobileRevealDelay || 500;

    this.isMobile = window.innerWidth < 768;

    this.heroElement = null;

    this.onResize = this.onResize.bind(this);

    this.init();
  }

  init() {
    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', () => this.setup());
    } else {
      this.setup();
    }
  }

  setup() {
    console.log('HeroAnimation initializing...');

    this.heroElement = document.querySelector(this.heroSelector);

    if (!this.heroElement) {
      console.error('Hero element not found:', this.heroSelector);
      return;
    }

    window.addEventListener('resize', this.onResize);

    this.resetHeroState();

    this.startRevealTimer();

    console.log('HeroAnimation initialized');
  }

  onResize() {
    this.isMobile = window.innerWidth < 768;
  }

  resetHeroState() {
    this.heroElement.classList.remove('content-revealed');

    const title = this.heroElement.querySelector('h1');
    const content = this.heroElement.querySelector('.hero-content');

    if (title) {
      title.style.opacity = '1';
    }

    if (content) {
      content.style.opacity = '0';
    }
  }

  startRevealTimer() {
    const delay = this.isMobile ? this.mobileRevealDelay : this.revealDelay;

    const title = this.heroElement.querySelector('h1');
    const content = this.heroElement.querySelector('.hero-content');

    setTimeout(() => {
      if (title) {
        title.style.opacity = null;
      }

      if (content) {
        content.style.opacity = null;
      }

      this.heroElement.classList.add('content-revealed');
    }, delay);
  }
}

