const header = document.querySelector('header');
const nav = document.querySelector('nav');



window.addEventListener('scroll', function () {
  const nav = document.getElementById('myNav');
  const position = window.scrollY;

  if (position > 50) {
    nav.classList.add('fixed-nav');
  } else {
    nav.classList.remove('fixed-nav');
  }
});

// //////////////////////////////////////////////////////////////////////

const jumpButton = document.querySelector('.jump');
let isButtonVisible = false;

function scrollToTop() {
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
}

window.addEventListener('scroll', function () {
  if (window.scrollY > 500 && !isButtonVisible) {
    isButtonVisible = true;
    jumpButton.style.transition = 'bottom 0.5s';
    jumpButton.style.bottom = '0px';
  } else if (window.scrollY <= 500 && isButtonVisible) {
    isButtonVisible = false;
    jumpButton.style.transition = 'bottom 0.5s';
    jumpButton.style.bottom = '-50px';
  }
});

jumpButton.addEventListener('click', scrollToTop);

////////////////////////////////////////////////////////////////////

document.addEventListener('DOMContentLoaded', function () {

  const introductionButton = document.querySelector('.menu._click1');
  const experienceButton = document.querySelector('.menu._click2');
  const introButton = document.querySelector('.sp_menu._click3');
  const experiencesButton = document.querySelector('.sp_menu._click4');

  introductionButton.addEventListener('click', function () {
    scrollToElement('.introduction');
  });

  experienceButton.addEventListener('click', function () {
    scrollToElement('.bg_black');
  });

  introButton.addEventListener('click', function () {
    scrollToElement('.introduction');
  });

  experiencesButton.addEventListener('click', function () {
    scrollToElement('.bg_black');
  });

  function scrollToElement(selector) {
    const element = document.querySelector(selector);
    if (element) {
      element.scrollIntoView({
        behavior: 'smooth'
      });
    }
  }
});


////////////////////////////////////////////////////////////

const signInButton = document.getElementById('signInButton');
const signInButton2 = document.getElementById('signInButton2');
const overlay = document.getElementById('overlay');

signInButton.addEventListener('click', function () {
  overlay.style.display = 'block';
});

signInButton2.addEventListener('click', function () {
  overlay.style.display = 'block';
});

overlay.addEventListener('click', function (e) {
  if (e.target === overlay) {
    overlay.style.display = 'none';
  }
});

function stopEvent(e) {
  e.stopPropagation();
}
//////////////////////////////////////////////////////////////////////////////


const menuToggle = document.getElementById('menuToggle');
const spNav = document.getElementById('spNav');
let isMenuVisible = false;


menuToggle.addEventListener('click', function (e) {
  e.stopPropagation();
  if (!isMenuVisible) {
    spNav.style.display = 'block';
    isMenuVisible = true;
  } else {
    spNav.style.display = 'none';
    isMenuVisible = false;
  }
});

document.addEventListener('click', function (event) {
  if (isMenuVisible && event.target !== menuToggle && !spNav.contains(event.target)) {
    spNav.style.display = 'none';
    isMenuVisible = false;
  }
});


///////////////////////////////////////////////////////////////////////////

window.addEventListener('DOMContentLoaded', function () {
  const nav = document.querySelector('nav');
  const currentPage = window.location.pathname;

  if (currentPage.includes('contact.blade.php') || currentPage.includes('confirm.blade.php') || currentPage.includes('complete.blade.php')) {
    nav.classList.add('fixed-nav');
  }
});