export const nav = () => {
    const openButton = document.getElementById('nav-bar')
    const closeButton = document.getElementById('nav-close')
    const nav = document.getElementById('nav')
    const links = document.getElementsByTagName('a')

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

    Array.from(links).forEach(link => link.addEventListener('click',  function(e) {

        if(link.href.split('/').pop().startsWith('#')) {
            e.preventDefault();
            document.querySelector(this.hash).scrollIntoView();
        }

    }))

}