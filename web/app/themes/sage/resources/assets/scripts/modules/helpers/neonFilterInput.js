export default function verifyInput(activeStep, step, self) {
  let validator = [];

  if (activeStep && self.$state.type === 'writing') {
    switch (step) {
      case '1' :
        break;
      case '2' :
        validator.push(checkTextArea(self.$text));
        validator.push(checkBigInput(self.$police));
        validator.push(checkBigInput(self.$colors));
        validator.push(checkBigInput(self.$sizesWriting));
        verifyAll(validator)
        break;
      case '3':
        validator.push(checkBigInput(self.$hangersSupport))
        activeStep.querySelectorAll('select').forEach(item => {
          validator.push(checkSelect(item));
        })
        verifyAll(validator)
        break;
      case 'final':
        activeStep.querySelectorAll('select').forEach(item => {
          validator.push(checkSelect(item));
        })
        // validator.push(checkTextArea(activeStep.querySelector('textarea')));
        verifyAll(validator)
        break;
    }


    let flagValidator = true;

    if (validator) {
      validator.forEach(item => {
        if (item[1] === false) {
          flagValidator = false
        }
      })
    }

    return flagValidator
  } else return true

}

function checkBigInput(item) {
  let selected = item.querySelector('ul>li.active')
  let itemAttr = item.getAttribute('for')
  return [`${itemAttr}`, !!selected];
}

function checkTextArea(item = []) {
  console.log(item)
  let itemAttr = item.getAttribute('name')
  return [`${itemAttr}`, !!item.value];

}

function checkSelect(item = []) {
  let itemAttr = item.getAttribute('id')
  return [`${itemAttr}`, !!item.value];
}


function verifyAll(validator) {
  validator.forEach(item => {
    if (item[1] === false) {
      let container = document.querySelector(`label[for="${item[0]}"]`)
      let errorMsg = container.querySelector('.error-msg')
      container.classList.add('error')
      errorMsg.style.display = 'inline';
    }
  })
}
