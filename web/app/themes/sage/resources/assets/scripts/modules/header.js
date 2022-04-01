import {module} from 'modujs';
// import gsap from 'gsap'

export default class extends module {

  constructor(m) {

    super(m);

    this.$container = this.el
    // this.$topBar = document.querySelector('.topBar')
    // this.$menuPrimary = this.el.querySelector('.nav-primary > div:first-of-type')
    // this.$toggleBurger = this.el.querySelector('.banner-mobile')
    this.$dropdown = this.el.querySelectorAll('.have-child')
    // this.$wcLinks = this.el.querySelectorAll('.woocommerce-link > svg > path')
    // this.$wcLinksCircles = this.el.querySelectorAll('.woocommerce-link > svg > circle')

    if (this.$container) {
      this.bindEvents()
    }
  }


  bindEvents() {
    console.log('✅HEADER✅')

    // if (this.checkTransparent()) {
    //   this.$topBar.style.display = 'none'
    //   this.scrollToEnd()
    // } else {
    //   this.topBarEnd()
    // }

    // if (window.matchMedia('(min-width: 768px)').matches) {
    //   this.$dropdown.forEach(item => {
    //     let dropdown = item.querySelector('.dropdown')
    //
    //
    //     item.addEventListener('click', () => {
    //       dropdown.classList.remove('hidden')
    //       setTimeout(() => {
    //         document.addEventListener('click', (e) => {
    //           console.log('detectClickOutside')
    //
    //           let targetEl = e.target;
    //
    //           do {
    //             if (targetEl === dropdown) {
    //               // This is a click inside, does nothing, just return.
    //               return;
    //             }
    //             // Go up the DOM
    //             targetEl = targetEl.parentNode;
    //           } while (targetEl);
    //           // This is a click outside.
    //           dropdown.classList.add('hidden')
    //         }, true);
    //       }, 500)
    //
    //     })
    //   })
    //
    //
    // }
    // else {
    //   this.$toggleBurger.addEventListener('click', () => {
    //     this.toggleMenu()
    //   })
    // }

  }


  //
  // checkTransparent() {
  //   return this.$container.classList.contains('transparent');
  // }

  // toggleMenu() {
  //   let active = this.$menuPrimary.classList.contains('active')
  //   let self = this
  //   switch (active) {
  //     case false:
  //       open()
  //       break;
  //     case true:
  //       close()
  //       break;
  //   }
  //
  //   function open() {
  //     self.$menuPrimary.classList.add('active');
  //     gsap.set(self.$menuPrimary, {opacity: 0, x: -100})
  //     gsap.to(self.$menuPrimary, {opacity: 1, x: 0, duration: 0.6})
  //
  //     //color of cart and account in mobile nav
  //     self.$wcLinks.forEach(item => {
  //       gsap.to(item, {fill: 'white', duration: 0.6})
  //     })
  //     self.$wcLinksCircles.forEach(item => {
  //       gsap.to(item, {stroke: 'white', duration: 0.6})
  //     })
  //     self.disableScroll()
  //   }
  //
  //   function close() {
  //     gsap.to(self.$menuPrimary, {opacity: 0, x: -100, duration: 0.6})
  //
  //
  //     //color of cart and account in mobile nav
  //     self.$wcLinks.forEach(item => {
  //       gsap.to(item, {fill: '#1d202c', duration: 0.6})
  //     })
  //     self.$wcLinksCircles.forEach(item => {
  //       gsap.to(item, {stroke: '#1d202c', duration: 0.6})
  //     })
  //     self.enableScroll()
  //
  //     setTimeout(() => {
  //       self.$menuPrimary.classList.remove('active');
  //     }, 600)
  //   }
  // }
  //
  // topBarEnd() {
  //   let self = this
  //   window.addEventListener('scroll', function () {
  //
  //     if (!self.$topBar.classList.contains('removed') && window.scrollY > 100) {
  //       self.$topBar.classList.add('removed')
  //     }
  //     if (self.$topBar.classList.contains('removed') && window.scrollY < 100) {
  //       self.$topBar.classList.remove('removed')
  //     }
  //   });
  // }
  //
  // scrollToEnd() {
  //   let self = this;
  //
  //   window.addEventListener('scroll', () => {
  //     let lastPos = window.scrollY;
  //     let ticking;
  //     if (!ticking) {
  //       window.requestAnimationFrame(() => {
  //         if (lastPos > 595) {
  //           self.$container.classList.remove('transparent')
  //           self.$wcLinks.forEach(item => {
  //             item.style.fill = '#1d202c'
  //           })
  //           self.$wcLinksCircles.forEach(item => {
  //             item.style.stroke = '#1d202c'
  //           })
  //         }
  //         if (lastPos < 595) {
  //           self.$container.classList.add('transparent')
  //           self.$wcLinks.forEach(item => {
  //             item.style.fill = 'white'
  //           })
  //           self.$wcLinksCircles.forEach(item => {
  //             item.style.stroke = 'white'
  //           })
  //         }
  //         ticking = false;
  //       });
  //     }
  //
  //     ticking = true;
  //   });
  // }

  disableScroll() {
    // document.html.style.overflow = 'hidden';
    document.querySelector('html').style.overflow = 'hidden';
  }

  enableScroll() {
    document.querySelector('html').style.overflow = '';
  }

  destroy() {
    // destroy method
    console.log('NAVBAR DESTROYED')
  }
}
