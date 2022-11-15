import './bootstrap';
import 'flowbite';

// Detect OS
// const body = document.querySelector('body');

// switch (true){
//     case (navigator.platform.indexOf('Win') != -1):
//     case (navigator.platform.indexOf('Mac') != -1):
//     case (navigator.platform.indexOf('Linux') != -1):
//         body.classList.add('hidden');
//         break;
// }


// target element that will be dismissed
const targetEl = document.getElementById('alert');

// options object
if (targetEl !== null) {
const options = {
  triggerEl: document.getElementById('alert'),
  transition: 'transition-opacity',
  duration: 1000,
  timing: 'ease-out',

  // callback functions
  onHide: (context, targetEl) => {
    console.log('element has been dismissed')
    console.log(targetEl)
  }
};

const dismiss = new Dismiss(targetEl, options);

setTimeout(() => {
    dismiss.hide();
}, 1500);
}

// showAll

window.onscroll = function(){
    const body = document.querySelector('body');
    const bodyOffset = body.offsetTop;

    if(window.pageYOffset > bodyOffset){
        body.classList.remove('h-screen');
        body.classList.add('h-full');
    }else{
        body.classList.remove('h-full');
        body.classList.add('h-screen');
    }
}

