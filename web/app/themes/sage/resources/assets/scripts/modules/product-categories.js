import {module} from 'modujs';
import gsap from 'gsap';

export default class extends module {

  constructor(m) {

    super(m);

    this.$container = this.el
    this.$items = this.el.querySelectorAll('.wc-block-product-categories-list--depth-1');

    this.init()
  }


  init() {
    console.log('✅Categories✅')

    this.$items.forEach(item => {

      let list = item.querySelectorAll('.wc-block-product-categories-list-item');
      let ArrayList = Array.from(list);

      if (ArrayList.length > 7 && window.matchMedia('(min-width: 768px)').matches) {

        ArrayList.slice(7, 150).forEach(item => {
          item.style.display = 'none'
        })

        this.addMoreCTA(item)
      } else if (window.matchMedia('(max-width: 767px)').matches) {

        ArrayList.slice(0, 150).forEach(item => {
          item.style.display = 'none'
        })

        this.addMoreCTA(item)
      }
    })
  }

  addMoreCTA(item) {
    let lastItem = item.children[item.children.length - 1];
    let self = this;

    if (lastItem.tagName !== 'BUTTON') {

      let btn = document.createElement('BUTTON');
      let list = item.querySelectorAll('.wc-block-product-categories-list-item');

      //Init CTA
      btn.innerHTML = 'VOIR PLUS';
      btn.classList.add('see-more')
      item.appendChild(btn)
      self.clickEvent(btn, list)
    }
  }

  clickEvent(btn, list) {
    let self = this;
    btn.addEventListener('click', function () {

      if (btn.textContent === 'VOIR PLUS') {
        self.loadAll(list)
        btn.innerHTML = 'VOIR MOINS';
      } else {
        self.clean(list)
        btn.innerHTML = 'VOIR PLUS';
      }
    })
  }

  loadAll(item) {
    Array.from(item).slice(0, 150).forEach(item => {

      item.style.display = '';
      gsap.set(item, {opacity: 0, x: -20})
      gsap.to(item, {opacity: 1, x: 0})
    })
  }

  clean(item) {
    if (window.matchMedia('(min-width: 768px)').matches) {
      Array.from(item).slice(7, 50).forEach(item => {
        let tl = gsap.timeline();
        tl.to(item, {duration: 0.5, opacity: 0, x: -20, display: 'none'})
      })
    } else {
      Array.from(item).slice(0, 50).forEach(item => {
        let tl = gsap.timeline();
        tl.to(item, {duration: 0.5, opacity: 0, x: -20, display: 'none'})
      })
    }
  }

  destroy() {
    console.log('Categories DESTROYED')
  }
}
