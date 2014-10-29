'use strict';

function attachEvent() {


    var eraseButtonList = document.querySelectorAll(".add-erase-button");
    attachEventToEraseButton(eraseButtonList);
}

function attachEventToEraseButton(list) {
    for (var item of list) {
        item.addEventListener('click', eraseButtonOnClick, false);
    }
}

/**
 * Cette fonction est appelé lors du click sur le bouton avec la croix sur les
 * champs de texte.
 */
function eraseButtonOnClick() {
    this.parentNode.parentNode.querySelector('input').value = "";
}