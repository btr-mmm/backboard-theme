export class DotNav {
  constructor(options = {}) {
    this.dotNavSelector = options.dotNavSelector || '.dot-nav';
    this.sectionsSelector = options.sectionsSelector || '.homepage-section';
    this.scrollContainerSelector =
      options.scrollContainerSelector || '#scroll-container';

    this.dotNav = null;
    this.sections = null;
    this.scrollContainer = null;
    this.dots = null;
    this.sectionTitles = null;

    this.init();
  }

  init() {
    // Wait for DOM to be fully loaded
    if (document.readyState === 'loading') {
      document.addEventListener(
        'DOMContentLoaded',
        this.setupNavigation.bind(this)
      );
    } else {
      this.setupNavigation();
    }
  }

  setupNavigation() {
    // Select elements
    this.dotNav = document.querySelector(this.dotNavSelector);
    this.sections = document.querySelectorAll(this.sectionsSelector);
    this.scrollContainer = document.getElementById(
      this.scrollContainerSelector.replace('#', '')
    );

    // Generate dot navigation dynamically
    this.generateDotNavigation();

    // Refresh selectors after dynamic generation
    this.dots = document.querySelectorAll('.dot');
    this.sectionTitles = document.querySelectorAll('.section-title');

    // Initial setup to first section
    if (this.dots.length > 0 && this.sectionTitles.length > 0) {
      this.dots[0].classList.add('active');
      this.sectionTitles[0].classList.add('active');
    }

    // Add event listeners
    this.addDotClickListeners();
    this.addSectionTitleClickListeners();
    this.addScrollListener();
  }

  generateDotNavigation() {
    this.sections.forEach((section, index) => {
      // Get section nav title from data attribute
      const navTitle = section.getAttribute('data-nav-title');

      // Create dot container
      const dotContainer = document.createElement('div');
      dotContainer.className = 'dot-container';

      // Create section title element
      const titleElement = document.createElement('span');
      titleElement.className = 'section-title';
      titleElement.textContent = navTitle;

      // Create dot element
      const dotElement = document.createElement('div');
      dotElement.className = 'dot';
      dotElement.setAttribute('data-section', section.id);

      // Append elements
      dotContainer.appendChild(titleElement);
      dotContainer.appendChild(dotElement);
      this.dotNav.appendChild(dotContainer);
    });
  }

  addDotClickListeners() {
    this.dots.forEach((dot) => {
      dot.addEventListener('click', () => {
        const sectionId = dot.getAttribute('data-section');
        this.scrollToSection(sectionId);
      });
    });
  }

  addSectionTitleClickListeners() {
    this.sectionTitles.forEach((title) => {
      title.addEventListener('click', () => {
        const dotContainer = title.closest('.dot-container');
        const dot = dotContainer.querySelector('.dot');
        const sectionId = dot.getAttribute('data-section');
        this.scrollToSection(sectionId);
      });
    });
  }

  scrollToSection(sectionId) {
    const section = document.getElementById(sectionId);
    if (section) {
      section.scrollIntoView({ behavior: 'smooth' });
    }
  }

  addScrollListener() {
    this.scrollContainer.addEventListener('scroll', () => {
      const scrollPosition = this.scrollContainer.scrollTop;
      const viewportHeight = this.scrollContainer.clientHeight;

      this.sections.forEach((section, index) => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;

        // Calculate how much of the section is in the viewport
        const visiblePixels = Math.min(
          scrollPosition + viewportHeight - sectionTop,
          sectionHeight
        );

        // Check if more than half of the section is visible
        if (visiblePixels > sectionHeight / 2) {
          // Reset all dots and titles
          this.dots.forEach((dot) => dot.classList.remove('active'));
          this.sectionTitles.forEach((title) =>
            title.classList.remove('active')
          );

          // Set active dot for this section
          this.dots[index].classList.add('active');
          this.sectionTitles[index].classList.add('active');
        }
      });
    });
  }
}

