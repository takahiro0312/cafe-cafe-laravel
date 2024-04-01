

////////////////////////////////////////////////


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


//////////////////////////////////////////////////////////////////////



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



if (window.location.href.indexOf('contact.php') !== -1) {
  const introLink = document.getElementById('introLink');
  const experienceLink = document.getElementById('experienceLink');
  const introLink2 = document.getElementById('introLink2');
  const experienceLink2 = document.getElementById('experienceLink2');

  introLink.innerHTML = `<a href="index.php#to_intro">はじめに</a>`;
  experienceLink.innerHTML = `<a href="index.php#to_black">体験</a>`;
  introLink2.innerHTML = `<a href="index.php#to_intro">はじめに</a>`;
  experienceLink2.innerHTML = `<a href="index.php#to_black">体験</a>`;
}



////////////////////////////////////////////////////////////////////

document.addEventListener('DOMContentLoaded', function () {
  const form = document.querySelector('#form_contact');
  const submitButton = document.getElementById('submit-button');
  const nav = document.querySelector('nav');
  const currentPage = window.location.pathname;


  if (currentPage.includes('contact.php') || currentPage.includes('confirm.php') || currentPage.includes('complete.php')) {
    nav.classList.add('fixed-nav');
  }

  submitButton.addEventListener('click', function (event) {
    event.preventDefault();

    const validationErrors = validateForm();

    if (validationErrors) {
      alert(validationErrors);
    } else {
      form.submit();
    }
  });

  function validateForm() {
    let validationErrors = '';

    const nameInput = document.getElementById('name');
    if (nameInput.value.trim() === '') {
      validationErrors += '名前は必須項目です。\n';
    } else if (nameInput.value.length > 10) {
      validationErrors += '名前は10文字以内でご入力ください。\n'
    }

    const kanaInput = document.getElementById('kana');
    if (kanaInput.value.trim() === '') {
      validationErrors += 'フリガナは必須項目です。\n';
    } else if (kanaInput.value.length > 10) {
      validationErrors += 'フリガナは10文字以内でご入力ください。\n'
    }

    const emailInput = document.getElementById('email');
    if (emailInput.value.trim() === '') {
      validationErrors += 'メールアドレスは正しくご入力ください。\n';
    }

    const bodyInput = document.getElementById('body');
    if (bodyInput.value.trim() === '') {
      validationErrors += 'お問い合わせ内容は必須項目です。\n';
    }

    return validationErrors.trim();
  }
});