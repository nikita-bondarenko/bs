export const cookie = () => {
    const element = document.getElementById('cookie')

    const agreeButton = document.getElementById('cookie-agree')

    setTimeout(() => {
        element.classList.add('open')
    }, 3000)

    agreeButton.addEventListener('click', () => {
        element.classList.remove('open')
        element.classList.add('closing')
        setTimeout(() => {
            element.classList.remove('closing')
        }, 300)
    })
}