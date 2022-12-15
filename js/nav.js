export const nav = () => {
    const openButton = document.getElementById('nav-bar')
    const closeButton = document.getElementById('nav-close')
    const nav = document.getElementById('nav')

    openButton.addEventListener('click', (e) => {
        e.stopPropagation()
        nav.classList.add('open')
    })

    closeButton.addEventListener('click', (e) => {
        nav.classList.remove('open')
    })

    document.body.addEventListener('click', (e) => {
        nav.classList.remove('open')
    })

    nav.addEventListener('click', (e) => {
        e.stopPropagation()
    })

}