import {module} from 'modujs';
import gsap from 'gsap'
import {Draggable} from 'gsap/Draggable';
//https://codepen.io/GreenSock/pen/JjomKjq
gsap.registerPlugin(Draggable)

export default class extends module {
  constructor(m) {
    super(m);

    this.$slides = this.el.querySelectorAll('li');


  }

  init() {
    console.log('Init slider ✅');

    this.bindEvent()
  }

  bindEvent() {

  }

  destroy() {
    console.log('destroy')
  }
}
