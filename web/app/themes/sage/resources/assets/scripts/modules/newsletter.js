import Utils from '../util/utils';
import {module} from 'modujs';



export default class extends module {

  constructor(m) {

    super(m);

    this.$container = this.el
    // this.$form = this.el.querySelector('form')
    this.$close = this.el.querySelector('.newsletter-content--close');
    this.$open_container = document.querySelectorAll('#newsletter_open');
    console.log('init newsletter')

  }

  init() {

    let cookieVal = Utils.getCookie('newsletter_attractive')
    console.log('✅NEWSLETTER✅')
    let self = this;

    /* check if cookie exist */
    if (cookieVal === '') {

      setTimeout(() => {
        self.$container.style.display = 'flex';
      }, 15000);
      console.log(this.close)
    }

    if (this.$open_container) {
      self.$open_container.forEach(item => {
        item.addEventListener('click', () => {
          self.$container.style.display = 'flex';
          // this.$container.style.opacity = '1';
        })
      })
    }

    this.$close.addEventListener('click', function () {
      console.log('close')
      self.close()
      self.cookieClose()
    })
  }


  hide() {
    // let self = this;
    const txt = this.el.querySelector('.newsletter-content>p')
    const newItem = document.createElement('p');

    this.$form.style.display = 'none'
    // this.$close.style.display = 'none'
    this.cookieAccept()

    const thankYou = '<strong>Merci, votre inscription à bien été prise en compte !</strong>'

    newItem.innerHTML = thankYou;
    txt.parentNode.replaceChild(newItem, txt);

    //Faire l'anim
    setTimeout(function () {
      this.$container.style.display = 'none';

    }, 2000);
  }

  close() {
    this.$container.style.display = 'none';
  }

  cookieClose() {
    Utils.setCookie('newsletter_attractive', 'closed', 7);
  }

  cookieAccept() {
    Utils.setCookie('newsletter_attractive', 'set', 60);
  }


  destroy() {
    // destroy method
    console.log('NEWSLETTER DESTROYED')
    this.$form.removeEventListener('submit', this)
    this.$form.removeEventListener('change', this)
    this.$close.removeEventListener('click', this)
  }

}
