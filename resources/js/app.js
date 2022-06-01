require('flowbite')

const show_menu_btn = document.getElementById('show_menu_btn')
const close_menu_btn = document.getElementById('close_menu_btn')
const mobile_menu = document.getElementById('mobile_menu')

show_menu_btn.addEventListener('click', _ => {
    mobile_menu.classList.remove('hidden')
})

close_menu_btn.addEventListener('click', _ => {
    mobile_menu.classList.add('hidden')
})