const target = document.getElementById("menu");
target.addEventListener('click', () => {
  target.classList.toggle('open');
  const nav = document.getElementById("nav");
  nav.classList.toggle('in');
});


document.addEventListener('change', e => {
  if(e.target.matches('[name=date]')){
    document.querySelector('#output').textContent=e.target.value;
  }
});


var time = document.getElementById('time');
    time.addEventListener('change', (event) => {
      var selecttime = document.getElementById('selecttime');
      selecttime.textContent = time.options[time.selectedIndex].textContent;
    });


var number = document.getElementById('number');
    number.addEventListener('change', (event) => {
      var selectnumber = document.getElementById('selectnumber');
      selectnumber.textContent = number.options[number.selectedIndex].textContent;
    });