import {module} from 'modujs';
import gsap from 'gsap';

export default class extends module {

  constructor(m) {

    super(m);

    this.$container = this.el
    this.$items = this.$container.querySelectorAll('.woocommerce-product-gallery__image')
    this.$main = this.$container.querySelector('.woocommerce-product-gallery__main')


    if (this.$items) {
      this.init()
    }
  }

  init() {
    console.log('✅Gallery✅')
    this.prepareItems()
    this.bindEvent()

  }

  prepareItems() {
    this.$items.forEach((item) => {
      item.querySelector('a').href = '';
    })
  }

  bindEvent() {
    this.$items.forEach((item) => {
      item.addEventListener('click', (e) => {
        e.preventDefault()
        console.log('change')
        this.switcher(item)
      })
    })
  }

  switcher(item) {
    console.log(item)
    console.log(this.$main)
    if (this.$main) {
      let img = this.$main.querySelector('img')
      let imgToSet = item.querySelector('img')
      console.log(imgToSet)

      let tl = gsap.timeline({
        onComplete: () => {
          img.src = imgToSet.src.replace('100x100', '600x600');
          img.srcset = imgToSet.src.replace('100x100', '600x600');

          let tlReturn = gsap.timeline();
          tlReturn.to(this.$main, {duration: 0.1, x: -10});
          tlReturn.to(this.$main, {duration: 0.3, opacity: 1, x: 0, ease: 'power2.out'}, '+=0.1');
        },
      });

      tl.to(this.$main, {duration: 0.3, opacity: 0, x: 10, ease: 'power2.in'});

    }
  }

  destroy() {
    // destroy method
    console.log('NEWSLETTER DESTROYED')
  }

}
