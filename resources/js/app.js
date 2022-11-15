import './bootstrap';
import 'flowbite';

// DETECT OS
var osDetection = navigator.userAgent || navigator.vendor || window.opera;
var windowsPhoneDetection = /windows phone/i.test(osDetection);
var androidDetection = /android/i.test(osDetection);
var iosDetection = /iPad|iPhone|iPod/.test(osDetection) && !window.MSStream;

const device = document.getElementById('device');
switch (true){
    case (windowsPhoneDetection):
    case (androidDetection):
    case (iosDetection):
      device.classList.add('device-active');
      break;
    default:
      device.classList.add('hidden');
      break;
}


// ALERT
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


// BODY HEIGHT
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

