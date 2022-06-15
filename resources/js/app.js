require('flowbite')

const show_menu_btn = document.getElementById('show_menu_btn')
const close_menu_btn = document.getElementById('close_menu_btn')
const mobile_menu = document.getElementById('mobile_menu')
const copyBtn = document.querySelector('#copy_btn')
const clipboardJS = require('clipboard')

if(copyBtn) new clipboardJS(copyBtn)

checkIfExistAndApplyListener(show_menu_btn, 'click', _ => {
    mobile_menu.classList.remove('hidden')
})

checkIfExistAndApplyListener(close_menu_btn, 'click', _ => {
    mobile_menu.classList.add('hidden')
})

function checkIfExistAndApplyListener(element, event, callback) {
    if(element) element.addEventListener(event, callback)
}