let selector = document.querySelectorAll('a[role="tab"]');
let tab = document.querySelectorAll('div[role="tabpanel"]');

let bounder = [];

for(let i = 0; i < selector.length; i++){
  if (selector[i].parentElement.className == 'active'){
    bounder[i] = true;
  } else {
    bounder[i] = false;
  }
}

function panel(e) {
  for(let i = 0; i < selector.length; i++) {
    if(bounder[i] === true) {
      selector[i].parentElement.classList.remove('active');
      tab[i].classList.remove('active');
      bounder[i] = false;
    }
  }
  let target = e.target;
  target.parentElement.className = 'active';
  for(let i = 0; i < selector.length; i++) {
    if(selector[i] === target) {
      bounder[i] = true;
    } else {
      bounder[i] = false;
    }
  }
  for(let i = 0; i < tab.length; i++) {
    if(bounder[i] === true) {
      tab[i].classList.add('active');
    }
  }
}

selector.forEach((selector) => selector.addEventListener('click', panel));