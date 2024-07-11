// Replace Text In Header
const checkReplace = document.querySelector('.replace-me');

if (checkReplace !== null) {
  const replace = new ReplaceMe(checkReplace, {
    animation: 'animated fadeIn',
    speed: 2000,
    separator: ',',
    loopCount: 'infinite',
    autoRun: true,
  });
}


// User Scroll For Navbar
function userScroll() {
  const navbar = document.querySelector('.navbar');

  window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
      navbar.classList.add('bg-dark');
      navbar.classList.add('border-bottom');
      navbar.classList.add('border-secondary');
      navbar.classList.add('navbar-sticky');
    } else {
      navbar.classList.remove('bg-dark');
      navbar.classList.remove('border-bottom');
      navbar.classList.remove('border-secondary');
      navbar.classList.remove('navbar-sticky');
    }
  });
}

document.addEventListener('DOMContentLoaded', userScroll);
// User Scroll For Navbar
// function userScroll() {
//     const navbar = document.querySelector('.fis');
  
//     window.addEventListener('scroll', () => {
//       if (window.scrollY > 50) {
//         navbar.classList.add('bg-dark');
//         navbar.classList.add('border-bottom');
//         navbar.classList.add('border-primary');
//         //navbar.classList.add('text-white');
//         navbar.style.position = 'absolute';
//         navbar.style.bottom = '0';
//         navbar.style.color = 'red';
//       } else {
//         navbar.style.position = 'static';
//         navbar.style.color = 'dark';
//       }
//     });
//   }
  
//   document.addEventListener('DOMContentLoaded', userScroll);