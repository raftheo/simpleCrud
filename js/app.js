//burger
function toggleMenu() {
    var menu = document.querySelector('.menu');
    menu.classList.toggle('expanded');
};
function openmodal(){
    var modal= document.querySelector('.deletebox');
    menu.classList.add('modal');
};



// arrow

  const dropdown = document.querySelector('.dropdown');
  const arrow = dropdown.querySelector('.arrow');

  dropdown.addEventListener('mouseenter', () => {
    arrow.innerHTML = '↓'; // Down arrow
  });

  dropdown.addEventListener('mouseleave', () => {
    arrow.innerHTML = '→'; // Right arrow
  });

