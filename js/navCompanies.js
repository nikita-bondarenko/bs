export const navCompanies = () => {
    const companiesList = document.querySelector('.companies__list')
    const companiesSection = document.querySelector('.companies')
    const nav = document.getElementById('nav')
    const openButton = document.getElementById('companies-open')
    const queueDelay = 100
    const animationDuration = 300
    let isOpen = false
    let isOpening = false
    let isClosing = false

    function open() {
        isOpening = true
        Array.from(companiesList.children).map((item, index) => setTimeout(() => {
            item.classList.add('open')
            index === companiesList.children.length - 1 ? isOpening = false : 1
            isOpen = true
            isClosing ? close() : 1
        }, index * queueDelay))
    }

    function close() {
        isClosing = true
        if (!isOpening) {
            companiesSection.classList.add('disabled')
            isOpen = false
            setTimeout(() => {
                companiesSection.classList.remove('disabled')
            }, (companiesList.children.length + 1) * queueDelay)

            Array.from(companiesList.children).reverse().map((item, index) => setTimeout(() => {
                item.classList.add('closing')
                item.classList.remove('open')
                setTimeout(() => {
                    item.classList.remove('closing')
                }, animationDuration)
                index === companiesList.children.length - 1 ? isClosing = false : 1
            }, index * queueDelay))
        }
    }

    if (document.body.clientWidth > 1200) {
        companiesSection.addEventListener('mouseenter', open)
        companiesSection.addEventListener('mouseleave', close)
    } else {
        openButton.addEventListener('click', (e) => {
            e.stopPropagation()
            if (!isOpen) {
                companiesSection.classList.add('open')
                open()
            } else {
                close()
                setTimeout(() => companiesSection.classList.remove('open'), 200 )
            }

        })
    }


    const links = document.getElementsByTagName('a')
    Array.from(links).forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            nav.classList.remove('open')
            // console.log(this.hash)
            document.querySelector(this.hash).scrollIntoView({
                behavior: "smooth"
            });
        })
    })

}