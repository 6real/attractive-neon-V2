import {module} from 'modujs';
import gsap from 'gsap';
import axios from 'axios';

import {ScrollToPlugin} from 'gsap/ScrollToPlugin';
import {Draggable} from 'gsap/Draggable';

import verifyInput from './helpers/neonFilterInput';

export default class extends module {

  constructor(m) {

    super(m);

    this.$container = this.el

    this.$previewContainer = this.el.querySelector('.neonCustom-preview')
    this.$preview = this.el.querySelector('.neonCustom-preview--content')
    this.$mockups = this.el.querySelectorAll('.neonCustom-mockups img')
    this.$toggleLight = this.el.querySelector('.toggle-light');
    this.$info = this.el.querySelector('.neonCustom-info')


    this.$navSteps = this.el.querySelector('.neonCustom-nav--steps')
    this.$formSteps = this.el.querySelectorAll('.neonCustom-form')

    this.$formStep1_Writing = this.el.querySelector('.neonCustom-form[data-step="1-writing"]')
    this.$formStep1_Logo = this.el.querySelector('.neonCustom-form[data-step="1-logo"]')
    this.$formStep2 = this.el.querySelector('.neonCustom-form[data-step="2"]')
    this.$formStep3 = this.el.querySelector('.neonCustom-form[data-step="3"]')

    this.$text = this.$formStep1_Writing.querySelector('textarea[data-product-text]')
    this.$police = this.$formStep1_Writing.querySelector('label[for="police"]')
    this.$colors = this.$formStep1_Writing.querySelector('label[for="colors"]')
    this.$sizesWriting = this.$formStep1_Writing.querySelector('label[for="sizes"]')
    this.$files = this.$formStep1_Logo.querySelector('label[for="files"]')
    this.$sizes = this.$formStep1_Logo.querySelector('label[for="sizes"]')
    this.$hangersSupport = this.$formStep2.querySelector('label[for="hangers-support"]')
    this.$select = this.el.querySelectorAll('select');

    this.$coef = {
      s: 10,
      m: 12.5,
      l: 15,
      height: 1.4,
    }
    this.$state = {
      dataset: {
        step: '1',
      },
    }

    //Prevent multiple execution
    this.$initer = 0

    if (this.$initier === 0) {
      this.init()
      this.$initer = 1
    }
  }


  init() {
    console.log('✅ Customization Of Neon ✅')
    this.bindInitEvent()
  }


  /**
   *
   * Bind Event Method
   *
   */
  bindInitEvent() {

    gsap.registerPlugin(ScrollToPlugin, Draggable);
    this.loadStep()
  }

  bindEvents() {
    const fontOptions = this.$police.querySelectorAll('[data-product-font-family]')
    const colorOptions = this.$colors.querySelectorAll('li')
    const sizesOptions = this.el.querySelectorAll('[data-product-size]')
    const fixationOptions = this.el.querySelectorAll('[data-product-fixation]')

    this.$mockups.forEach(item => {
      item.addEventListener('click', () => {
        this.setMockup(item)
      })
    })
    this.$toggleLight.addEventListener('click', () => {
      this.switchLight()
    })

    sizesOptions.forEach(item => {
      item.addEventListener('click', () => {
        this.setSize(item)
      })
    })
    fixationOptions.forEach(item => {
      item.addEventListener('click', () => {
        this.setFixation(item)
      })
    })

    this.$formSteps.forEach(item => {
      let links = item.querySelectorAll('[data-step]')

      links.forEach(item => {
        item.addEventListener('click', () => {
          this.setStep(item)
        })
      })

    })
    this.$navSteps.querySelectorAll('li').forEach(item => {
      item.addEventListener('click', () => {
        this.setStep(item)
      })
    })

    this.$text.addEventListener('input', () => {
      this.$state.textContent = this.$text.value
      this.setText()
    })


    fontOptions.forEach(item => {
      item.addEventListener('click', () => {
        this.setFont(item, fontOptions)
      })
    })

    colorOptions.forEach(item => {
      item.addEventListener('click', () => {
        this.setColor(item)
      })
    })

    this.$select.forEach(item => {
      item.addEventListener('change', (e) => {
        this.setSelect(item, e)
      })
    })

    this.$files.addEventListener('input', (e) => {
      this.setFiles(e);
    })

    Draggable.create(this.$preview, {
      bounds: this.$previewContainer,
      inertia: true,
    });
  }

  /**
   *
   * Init Method Form
   *
   */

  loadStep() {


    this.$state = {type: 'writing'}
    gsap.to(window, {duration: 0.6, scrollTo: 0});
    this.bindEvents()
    this.initFont()

  }

  initFont() {
    const fontChoices = this.$police.querySelectorAll('[data-product-font-family]')
    if (this.$state.type !== 'logo') {
      //clean markup
      this.$preview.innerHTML = '';
      this.$previewContainer.classList.remove('is_logo')

      fontChoices.forEach((item, index) => {
        if (index === 0) {
          this.$preview.style = `font-family: ${item.dataset.productFontFamily};`
        }
        item.style = `font-family:${item.dataset.productFontFamily}`
      })
    } else {
      this.$preview.style.display = 'none'
      this.$previewContainer.classList.add('is_logo')
    }
  }


  /**
   *
   * Setter Method Form
   *
   */

  setText() {
    let canvas = this.$preview
    canvas.classList.add('active')
    let ctx = this.$preview.getContext('2d');
    canvas.width = 1000
    canvas.height = 500
    canvas.style.letterSpacing = '5px';
    ctx.save();
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    if (this.$state.font) {
      ctx.font = this.$state.font.fontSize * 2 + 'px ' + this.$state.font.family;

    } else ctx.font = '80px Arial'

    if (this.$state.color) {
      ctx.fillStyle = this.$state.color.hexa;
      ctx.shadowColor = this.$state.color.hexa
      ctx.shadowOffsetX = 0;
      ctx.shadowOffsetY = 0;
      ctx.shadowBlur = 30;

    } else ctx.fillStyle = '#fff'

    ctx.textAlign = 'center'
    ctx.textBaseline = 'middle'
    ctx.fillText(this.$state.textContent, canvas.width / 2, canvas.height / 2);

    if (this.$state.font) {
      let width_px = ctx.measureText(this.$state.textContent).width / 2
      let heightRect = this.measureTextHeight(this.$state.textContent, this.$state.font.family, this.$state.font.fontSize)
      let height_px = (parseInt(this.$state.font.fontSize) + heightRect) / 2;
      this.$state.font.width_px = width_px;
      this.$state.font.height_px = height_px;
      this.measurePxToCm()
    }


    ctx.restore();
    this.calcPrice()
  }


  setSelect(item) {

    let additionnal_price = item.options[item.selectedIndex].getAttribute('data-price');

    if (additionnal_price) {
      if (this.$state.selectPrice) {
        this.$state.selectPrice[`${item.name}`] = parseFloat(additionnal_price)
      } else {
        this.$state.selectPrice = {}
        this.$state.selectPrice[`${item.name}`] = parseFloat(additionnal_price)
      }
    }

    this.$state[`${item.name}`] = item.value
    this.setOptionsProduct(this.$state)
  }

  setFont(font, fontChoices) {
    this.$preview.style.fontFamily = font.dataset.productFontFamily
    //Product State set
    this.$state.font = {
      family: font.dataset.productFontFamily,
      fontSize: font.dataset.productPreviewSize,
      price_letter: font.dataset.priceLetter,
      height_letter: font.dataset.heightLetter,
      coef_complexity: font.dataset.coefComplexity,
      base_price: font.dataset.priceBase,
    }
    this.setOptionsProduct(this.$state)

    fontChoices.forEach(item => {
      if (item.classList.contains('active')) item.classList = '';
    })

    font.classList.add('active')
    this.setText()
  }

  setSize(item) {
    const sizesOptions = this.el.querySelectorAll('[data-product-size]')
    this.$state.sizes = item.dataset.productSize
    this.$state.sizes_coef = item.dataset.productSizeCoef
    this.$state.price_coef = item.dataset.productPriceCoef
    this.measurePxToCm()


    this.calcPrice()
    //Front Modification
    sizesOptions.forEach(option => {
      if (option !== item) {
        option.classList.remove('active')
      }
    })

    item.classList.add('active')
  }

  setFixation(item) {
    //Product State set
    const supportOptions = this.el.querySelectorAll('[data-product-fixation]')
    this.$state.fixation = item.dataset.productFixation

    this.setOptionsProduct(this.$state)

    //Front Modification
    supportOptions.forEach(option => {
      if (option !== item) {
        option.classList.remove('active')
      }
    })

    item.classList.add('active')
  }

  setColor(item) {
    this.$state.color = {hexa: item.dataset.productColor, name: item.dataset.productColorName};
    if (this.$state.selectPrice) {
      this.$state.selectPrice.color = parseFloat(item.dataset.priceCoef);
    } else {
      this.$state.selectPrice = {}
      this.$state.selectPrice.color = parseFloat(item.dataset.priceCoef);
    }
    this.setOptionsProduct(this.$state)
    this.setText()

    this.$colors.querySelectorAll('li').forEach(color => {
      if (color === item) {
        color.classList.add('active')
      } else if (color.classList.contains('active')) {
        color.classList.remove('active')
      }
    })
  }

  setOptionsProduct(state) {
    let container = this.$info.querySelector('ul');
    let html = '';
    console.log(state)

    Object.entries(state).forEach(item => {
      let addPrice = 0;

      switch (item[0]) {
        default:
          html += '<li><span>' + item[0] + ' : </span> <strong> ' + item[1] + ' </strong></li>';
          break;
        case 'color':
          html += '<li><span>' + 'Couleur' + ' : </span> <strong width="50px" style="vertical-align:middle; border: 10px solid ' + item[1].hexa + '" ></strong>&nbsp;' + item[1].name[0].toUpperCase() + item[1].name.substring(1) + '</li>';
          break;
        case 'price':

          if (this.$state.selectPrice) {
            if (this.$state.selectPrice.color_support) {
              addPrice = addPrice + this.$state.selectPrice.color_support;
            }
            if (this.$state.selectPrice.color_tube) {
              addPrice = addPrice + this.$state.selectPrice.color_tube
            }
            if (this.$state.selectPrice.shipping_delay) {
              addPrice = addPrice + this.$state.selectPrice.shipping_delay
            }
            if (this.$state.selectPrice.color !== '1') {
              let colorPrice = (this.$state.price * this.$state.selectPrice.color) - this.$state.price;
              addPrice = addPrice + colorPrice
            }
          }
          this.$state.finalPrice = Math.round(parseFloat(item[1]) + addPrice);

          if (isNaN(this.$state.finalPrice) || this.$state.finalPrice === undefined || this.$state.finalPrice < this.$state.font.base_price) {
            this.$state.finalPrice = 150
          }
          this.$info.querySelector('.neonCustom-info--price > strong').innerText = this.$state.finalPrice
          break;
        case 'textContent':
          html += '<li><span>' + 'Texte' + ' : </span> <strong> ' + item[1] + ' </strong></li>';
          break;
        case 'font':
          html += '<li><span>' + 'Police' + ' : </span> <strong> ' + item[1].family + ' </strong></li>';
          break;
        case 'width':
          html += '<li><span>' + 'Longueur' + ' : </span> <strong> ' + item[1] + ' cm' + ' </strong></li>';
          break;
        case 'height':
          html += '<li><span>' + 'Hauteur' + ' : </span> <strong> ' + item[1] + ' cm' + ' </strong></li>';
          break;
        case 'sizes':
          html += '<li><span>' + 'Taille' + ' : </span> <strong> ' + item[1] + ' </strong></li>';
          break;
        case 'shape_support':
          html += '<li><span>' + 'Forme du support' + ' : </span> <strong> ' + item[1] + ' </strong></li>';
          break;
        case 'color_support':
          html += '<li><span>' + 'Couleur du support' + ' : </span> <strong> ' + item[1] + ' </strong></li>';
          break;
        case 'color_tube':
          html += '<li><span>' + 'Couleur du tube' + ' : </span> <strong> ' + item[1] + ' </strong></li>';
          break;
        case 'shipping_delay':
          html += '<li><span>' + 'Méthode de livraison' + ' : </span> <strong> ' + item[1] + ' </strong></li>';
          break;
        case 'sizes_coef':
        case 'price_coef':
        case 'finalPrice':
        case 'selectPrice':
        case 'type':
          return;
      }
    })

    container.innerHTML = html;
  }

  setMockup(item) {
    let active = this.el.querySelector('.neonCustom-mockups img.active')
    let previewImg = this.$previewContainer.querySelector('img')
    active.classList.remove('active')

    const tl = gsap.timeline()
    tl.to(previewImg, {duration: 0.2, opacity: 0})
    tl.to(previewImg, {duration: 0.2, opacity: 1}, 0.2)
    item.classList.add('active')

    setTimeout(() => {
      this.$previewContainer.querySelector('img').src = item.src
    }, 150)

    this.switchLight('on')

  }

  setStep(cta) {
    let activeStep = this.$container.querySelector('.neonCustom-form.active')
    let step = cta.dataset == null ? '1' : cta.dataset.step
    this.$previewContainer.classList.add('active')
    this.$navSteps.classList.add('active')
    let inputResult = verifyInput(activeStep, step, this)

//Gestion des errors

    if (inputResult === true || inputResult === undefined) {
      let errorItems = document.querySelectorAll('label.error')
      errorItems.forEach(item => {
        item.classList.remove('error')
      })

      switch (step) {
        case '1' :
          if (activeStep) {
            activeStep.classList.remove('active')
          }

          if (this.$state.type === 'writing') {
            this.$formStep1_Writing.classList.add('active')
          } else if (this.$state.type === 'logo') {
            this.$formStep1_Logo.classList.add('active')
            //On enlève le switch lumiere et le mockup
            let toggleLight = document.querySelector('.toggle-light')
            let mockups = document.querySelector('.neonCustom-mockups')
            toggleLight.style.display = 'none'
            mockups.style.display = 'none'
          }

          this.$navSteps.querySelector('.active').classList.remove('active')
          this.$navSteps.querySelector('[data-step="1"]').classList.add('active')
          break;

        case '2':
          activeStep.classList.remove('active')
          activeStep.classList.remove('active')
          this.$formStep2.classList.add('active')
          this.$navSteps.querySelector('.active').classList.remove('active')
          this.$navSteps.querySelector('[data-step="2"]').classList.add('active')
          break;

        case '3':
          activeStep.classList.remove('active')
          this.$formStep3.classList.add('active')
          this.$navSteps.querySelector('.active').classList.remove('active')
          this.$navSteps.querySelector('[data-step="3"]').classList.add('active')
          break;
        case 'final':
          if (this.$state.type === 'writing') {
            this.createProduct(this.$state)
          } else if (this.$state.type === 'logo') {
            this.sendMail(this.$state)
          }
          break;
      }
    }

    this.transitionStep()

  }


  /**
   *
   * Utils
   *
   */

  measureTextHeight(content, fontFamily, fontSize) {
    let text = document.createElement('span');
    text.style.fontFamily = fontFamily;
    text.style.fontSize = fontSize + 'px';

    text.textContent = content;
    document.body.appendChild(text);
    let result = text.getBoundingClientRect().height;

    document.body.removeChild(text);
    return result;
  }

  measurePxToCm() {
    let width_px = this.$state.font.width_px;
    let height_px = this.$state.font.height_px;
    let height = this.$state.font.height_letter
    let width = (width_px * height) / height_px

    this.$state.height = height * this.$state.sizes_coef
    this.$state.width = Math.round(width) * this.$state.sizes_coef
  }

  calcPrice() {
    //Nombre de lettre * prix d'une lettre * coef de la taille
    if (!this.$state.textContent || !this.$state.font) {
      return;
    }
    let nbLetter = this.$state.textContent.length
    let price_calculed = (parseInt(this.$state.font.base_price) + (nbLetter * this.$state.font.price_letter * this.$state.font.coef_complexity)) * this.$state.price_coef;
    this.$state.price = Math.round(price_calculed);
    this.setOptionsProduct(this.$state)
  }


  transitionStep() {
    gsap.to(window, {duration: 0.6, scrollTo: 0});
  }


  switchLight(item) {
    let check = this.$toggleLight.classList.contains('active');
    let image = this.$previewContainer.querySelector('figure img')
    let self = this;

    function on() {
      self.$toggleLight.classList.remove('active')
      gsap.to(image, {opacity: '0.7'})
    }

    function off() {
      self.$toggleLight.classList.add('active')
      gsap.to(image, {opacity: '0.2'})
    }

    if (!item) {
      if (!check) {
        off()
      } else {
        on()
      }
    } else if (item === 'on') {
      self.$toggleLight.classList.remove('active')
    } else off()
  }

  /**
   *
   * Create Product in WooCommerce
   *
   */
  createProduct(state) {

    let canvas = this.$preview
    let dataURL = canvas.toDataURL('image/jpeg', 1.0);

    // this.downloadImage(dataURL, 'my-neon.jpeg');


    let form_data = new URLSearchParams();

    form_data.append('action', 'ajax_create_product');
    form_data.append('price', state.finalPrice);
    form_data.append('img', dataURL);
    form_data.append('type', state.type);
    form_data.append('font', state.font.family);
    form_data.append('sizes', `${state.width} x ${state.height}`);
    form_data.append('color', state.color.name);
    form_data.append('color_support', state.color_support);
    form_data.append('shape_support', state.shape_support);
    form_data.append('fixation', state.fixation);
    form_data.append('color_tube', state.color_tube);
    form_data.append('shipping_delay', state.shipping_delay);

    // eslint-disable-next-line no-undef
    form_data.append('_ajax_nonce', ajax_object.ajax_nonce);
    this.initLoader()
    // eslint-disable-next-line no-undef
    axios.post(ajax_object.ajax_url, form_data)
      .then((response) => {
        console.log(response.data);

        if (response.data.data.redirectUrl) {
          location.replace(response.data.data.redirectUrl)
        }
      })

      .catch((error) => {
        console.log(error);
      });
  }




  initLoader() {
    this.$container.querySelector('.neonCustom').classList.add('disabled')
    document.querySelector('#loader').classList.add('active')
  }
  /**
   *
   * Send Mail -> Ask for Logo
   *
   */
  // sendMail(state) {
  //
  //
  //   let form_data = new URLSearchParams();
  //   console.log(state)
  //   form_data.append('ask', JSON.stringify(state));
  //   form_data.append('action', 'ajax_send_mail_request');
  //
  //   // eslint-disable-next-line no-undef
  //   form_data.append('_ajax_nonce', ajax_object.ajax_nonce);
  //
  //   // eslint-disable-next-line no-undef
  //   axios.post(ajax_object.ajax_url, form_data)
  //     .then((response) => {
  //       console.log(response.data);
  //     })
  //
  //     .catch((error) => {
  //       console.log(error);
  //     });
  // }

  downloadImage(data, filename = 'untitled.jpeg') {
    let a = document.createElement('a');
    a.href = data;
    a.download = filename;
    document.body.appendChild(a);
    a.click();
  }

  /**
   *
   * Destroy Method
   *
   */
  destroy() {
    console.log('Categories DESTROYED')
  }
}
