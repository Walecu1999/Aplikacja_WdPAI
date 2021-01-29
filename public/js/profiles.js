const phoneButtons = document.querySelectorAll('.phone-button');
const phoneLabels = document.querySelectorAll('.number');

for(let i=0; i < phoneButtons.length; i++){
    phoneButtons[i].addEventListener('click', function () {
        phoneLabels[i].classList.remove('hidden-element');
        phoneButtons[i].classList.add('hidden-element');
    })
}