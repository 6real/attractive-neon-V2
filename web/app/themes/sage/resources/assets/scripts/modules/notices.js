import {module} from 'modujs';
import gsap from 'gsap';

export default class extends module {

  constructor(m) {

    super(m);

    this.$container = this.el

    this.init()
  }

  init() {
    console.log('✅NOTICE✅')
    gsap.set(this.$container, {x: 400, y: -40, opacity: 0});

    this.bindEvent()
  }


  bindEvent() {
    console.log(this.$container)
    let tl = gsap.timeline();
    tl.to(this.$container, {duration: 0.4, x: 0, opacity: 1, ease: 'power2.inOut'}, '+=1');
    tl.to(this.$container, {duration: 0.6, x: 400, opacity: 0, ease: 'power2.inOut'}, '+=5');

  }


  destroy() {
    // destroy method
    console.log('Notice DESTROYED')
  }

}
