export class DotNav {
  constructor(options = {}) {
    this.dotNavSelector = options.dotNavSelector || '.dot-nav';
    this.sectionsSelector = options.sectionsSelector || '.homepage-section';
    this.scrollContainerSelector =
      options.scrollContainerSelector || '#scroll-container';
    this.contentSelector = options.contentSelector || '.content-reveal';
    this.titleSelector = options.titleSelector || 'h2';
    this.revealDelay = options.revealDelay || 1000; // 1 second by default

    // Mobile specific settings
    this.isMobile = window.innerWidth < 768;
    this.mobileRevealDelay = options.mobileRevealDelay || 500; // Faster reveal on mobile

    this.dotNav = null;
    this.sections = [];
    this.scrollContainer = null;
    this.dots = [];
    this.sectionTitles = [];

    // Section tracking variables
    this.currentSectionIndex = -1;
    this.revealTimers = {};

    // Throttling for scroll events
    this.scrollTimeout = null;
    this.scrollThrottle = this.isMobile ? 100 : 50; // Increase throttle on mobile

    // Bind method contexts
    this.onScroll = this.onScroll.bind(this);
    this.onResize = this.onResize.bind(this);
    this.handleTouchStart = this.handleTouchStart.bind(this);
    this.handleTouchMove = this.handleTouchMove.bind(this);
    this.handleTouchEnd = this.handleTouchEnd.bind(this);

    // Touch handling
    this.touchStartY = 0;
    this.touchEndY = 0;
    this.minSwipeDistance = 50;

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
    console.log('DotNav initializing...');

    // Select core elements
    this.dotNav = document.querySelector(this.dotNavSelector);
    this.sections = Array.from(
      document.querySelectorAll(this.sectionsSelector)
    );
    this.scrollContainer = document.getElementById(
      this.scrollContainerSelector.replace('#', '')
    );

    if (!this.scrollContainer) {
      console.error(
        'Scroll container not found:',
        this.scrollContainerSelector
      );
      return;
    }

    if (this.sections.length === 0) {
      console.error('No sections found with selector:', this.sectionsSelector);
      return;
    }

    // Force reset all sections initially
    this.sections.forEach((section) => {
      this.forceHideContent(section);
    });

    // Generate navigation dots
    this.generateDotNavigation();

    // Set up scroll event listener with throttling
    this.scrollContainer.addEventListener('scroll', this.onScroll);

    // Set up resize event listener
    window.addEventListener('resize', this.onResize);

    // Set up touch event listeners for mobile swipe
    this.scrollContainer.addEventListener('touchstart', this.handleTouchStart, {
      passive: true,
    });
    this.scrollContainer.addEventListener('touchmove', this.handleTouchMove, {
      passive: true,
    });
    this.scrollContainer.addEventListener('touchend', this.handleTouchEnd, {
      passive: true,
    });

    // Initial calculation
    setTimeout(() => {
      this.calculateCurrentSection();

      // If we're at the first section, start its timer immediately
      if (this.currentSectionIndex === 0) {
        this.startRevealTimer(this.sections[0]);
      }
    }, 100);

    console.log('DotNav initialized with', this.sections.length, 'sections');
  }

  onResize() {
    // Update mobile status
    const wasMobile = this.isMobile;
    this.isMobile = window.innerWidth < 768;

    // Update throttle timing
    this.scrollThrottle = this.isMobile ? 100 : 50;

    // Recalculate current section if mobile status changed
    if (wasMobile !== this.isMobile) {
      this.calculateCurrentSection();
    }
  }

  handleTouchStart(e) {
    this.touchStartY = e.touches[0].clientY;
  }

  handleTouchMove(e) {
    this.touchEndY = e.touches[0].clientY;
  }

  handleTouchEnd() {
    const swipeDistance = this.touchStartY - this.touchEndY;

    if (Math.abs(swipeDistance) > this.minSwipeDistance) {
      // Swipe down (negative) or swipe up (positive)
      if (
        swipeDistance > 0 &&
        this.currentSectionIndex < this.sections.length - 1
      ) {
        // Swipe up - go to next section
        this.scrollToSection(this.sections[this.currentSectionIndex + 1].id);
      } else if (swipeDistance < 0 && this.currentSectionIndex > 0) {
        // Swipe down - go to previous section
        this.scrollToSection(this.sections[this.currentSectionIndex - 1].id);
      }
    }
  }

  forceHideContent(section) {
    // First, make sure any existing class is removed
    section.classList.remove('content-revealed');

    // Get content and title elements
    const content = section.querySelector(this.contentSelector);
    const title = section.querySelector(this.titleSelector);

    // Force content to be hidden and title to be visible
    if (content) {
      content.style.opacity = '0';
      content.style.transition = 'opacity 500ms ease-in-out';
    }

    if (title) {
      title.style.opacity = '1';
      title.style.transition = 'opacity 500ms ease-in-out';
    }
  }

  forceShowContent(section) {
    // Add the revealed class
    section.classList.add('content-revealed');

    // Get content and title elements
    const content = section.querySelector(this.contentSelector);
    const title = section.querySelector(this.titleSelector);

    // Force content to be visible and title to be hidden
    if (content) {
      content.style.opacity = '1';
    }

    if (title) {
      title.style.opacity = '0';
    }
  }

  generateDotNavigation() {
    if (!this.dotNav) return;

    // Clear any existing dots
    this.dotNav.innerHTML = '';

    // Create dots for each section
    this.sections.forEach((section, index) => {
      const navTitle =
        section.getAttribute('data-nav-title') || `Section ${index + 1}`;

      // Create dot container
      const dotContainer = document.createElement('div');
      dotContainer.className = 'dot-container';

      // Create title element
      const titleElement = document.createElement('span');
      titleElement.className = 'section-title';
      titleElement.textContent = navTitle;

      // Create dot element
      const dotElement = document.createElement('div');
      dotElement.className = 'dot';
      dotElement.setAttribute('data-section', section.id);
      dotElement.setAttribute('data-index', index);

      // Add click event
      dotElement.addEventListener('click', () => {
        this.scrollToSection(section.id);
      });

      titleElement.addEventListener('click', () => {
        this.scrollToSection(section.id);
      });

      // Append elements
      dotContainer.appendChild(titleElement);
      dotContainer.appendChild(dotElement);
      this.dotNav.appendChild(dotContainer);
    });

    // Update references
    this.dots = Array.from(document.querySelectorAll('.dot'));
    this.sectionTitles = Array.from(
      document.querySelectorAll('.section-title')
    );
  }

  scrollToSection(sectionId) {
    const section = document.getElementById(sectionId);
    if (section) {
      section.scrollIntoView({ behavior: 'smooth' });
    }
  }

  onScroll() {
    // Throttle scroll events
    if (this.scrollTimeout) return;

    this.scrollTimeout = setTimeout(() => {
      this.calculateCurrentSection();
      this.scrollTimeout = null;
    }, this.scrollThrottle);
  }

  calculateCurrentSection() {
    const scrollPosition = this.scrollContainer.scrollTop;
    const viewportHeight = this.scrollContainer.clientHeight;
    const oldSectionIndex = this.currentSectionIndex;
    let mostVisibleIndex = -1;
    let maxVisibility = 0;

    // Find the most visible section
    this.sections.forEach((section, index) => {
      const sectionTop = section.offsetTop;
      const sectionHeight = section.clientHeight;
      const scrollBottom = scrollPosition + viewportHeight;

      // Calculate visibility percentage
      let visibleHeight = 0;

      if (
        sectionTop < scrollBottom &&
        sectionTop + sectionHeight > scrollPosition
      ) {
        // Section is at least partially visible
        const visibleTop = Math.max(scrollPosition, sectionTop);
        const visibleBottom = Math.min(
          scrollBottom,
          sectionTop + sectionHeight
        );
        visibleHeight = visibleBottom - visibleTop;
      }

      const visibilityPercentage = visibleHeight / sectionHeight;

      // Keep track of most visible section
      if (visibilityPercentage > maxVisibility) {
        maxVisibility = visibilityPercentage;
        mostVisibleIndex = index;
      }
    });

    // Update the active section only if it changed
    if (mostVisibleIndex !== oldSectionIndex) {
      console.log(
        `Changing active section from ${oldSectionIndex} to ${mostVisibleIndex}`
      );

      // Cancel all timers
      Object.keys(this.revealTimers).forEach((sectionId) => {
        clearTimeout(this.revealTimers[sectionId]);
        delete this.revealTimers[sectionId];
      });

      // Hide content in all sections
      this.sections.forEach((section) => {
        this.forceHideContent(section);
      });

      // Update the active section
      this.currentSectionIndex = mostVisibleIndex;

      // Update dots
      this.dots.forEach((dot, index) => {
        dot.classList.toggle('active', index === mostVisibleIndex);
      });

      this.sectionTitles.forEach((title, index) => {
        title.classList.toggle('active', index === mostVisibleIndex);
      });

      // Start reveal timer for the new section if valid
      if (mostVisibleIndex >= 0 && mostVisibleIndex < this.sections.length) {
        this.startRevealTimer(this.sections[mostVisibleIndex]);
      }
    }
  }

  startRevealTimer(section) {
    if (!section) return;

    const sectionId = section.id;

    // Clear any existing timer
    if (this.revealTimers[sectionId]) {
      clearTimeout(this.revealTimers[sectionId]);
    }

    // Use mobile delay value if on mobile
    const delay = this.isMobile ? this.mobileRevealDelay : this.revealDelay;

    // Start new timer
    this.revealTimers[sectionId] = setTimeout(() => {
      // Only show content if this is still the active section
      if (this.sections[this.currentSectionIndex] === section) {
        this.forceShowContent(section);
      }

      // Clear the timer reference
      delete this.revealTimers[sectionId];
    }, delay);
  }
}

