require('flowbite')

const show_menu_btn = document.getElementById('show_menu_btn')
const close_menu_btn = document.getElementById('close_menu_btn')
const mobile_menu = document.getElementById('mobile_menu')
const copyBtn = document.querySelector('#copy_btn')
const timer_container = document.getElementById('timer_container')
const clipboardJS = require('clipboard')

function checkIfExistAndApplyListener(element, event, callback) {
    if(element) element.addEventListener(event, callback)
}

checkIfExistAndApplyListener(show_menu_btn, 'click', _ => {
    mobile_menu.classList.remove('hidden')
})

checkIfExistAndApplyListener(close_menu_btn, 'click', _ => {
    mobile_menu.classList.add('hidden')
})

if(copyBtn) new clipboardJS(copyBtn)
if(timer_container) {
    const datetimePlaceholder = document.getElementById('datetime_placeholder')
    const startDateTime = new Date(timer_container.dataset.start_datetime)
    setInterval(function() {
        let dateTime;
        const now = new Date().getTime();
        const timestamp = startDateTime - now;

        if(timestamp === 0) clearInterval()

        const days = Math.floor(timestamp / (1000 * 60 * 60 * 24));
        const hours = Math.floor((timestamp % (1000 * 60 * 60 * 24))/(1000 * 60 * 60));
        const minutes = Math.floor((timestamp % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((timestamp % (1000 * 60)) / 1000);

        if(days === 0 && hours === 0) dateTime = `${minutes} minutes : ${seconds} sécondes`
        else if(days === 0 && hours !== 0) {
            dateTime = `${hours} heure(s) : ${minutes} minute(s) : ${seconds} séconde(s)`
        } else {
            dateTime = `${days} jour(s) ${hours} heure(s) : ${minutes} minute(s) : ${seconds} séconde(s)`
        }

        datetimePlaceholder.innerText = dateTime
    })
}