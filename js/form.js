export const form = () => {
    const form = document.getElementById('form'),
        phoneInput = document.getElementById('phone'),
        popup = document.getElementById('popup'),
        closePopupButton = document.getElementById('popup-close'),
        openPopupClass = 'open',
        closingPopupClass = 'closing',
        errorPopupClass = 'error',
        animationDuration = 300
    let isPopupOpen = false

    const closePopup = () => {
        popup.classList.remove(openPopupClass)
        popup.classList.add(closingPopupClass)
        setTimeout(() => {
            popup.classList.remove(closingPopupClass, errorPopupClass)
            isPopupOpen = false
        }, animationDuration)
        form.name.value = ''
        form.email.value = ''
        form.phone.value = ''
        form.textarea.value = ''
    }

    const openPopup = () => {
        popup.classList.add(openPopupClass)
        setTimeout(() => {
            isPopupOpen = true
        }, animationDuration)

    }

    const openErrorPopup = () => {
        popup.classList.add(errorPopupClass, openPopupClass)
        isPopupOpen = true
    }

    document.body.addEventListener('click', () => {
        if (isPopupOpen) {
            closePopup()
        }
    })

    popup.addEventListener('click', (e) => e.stopPropagation())

    closePopupButton.addEventListener('click', () => closePopup())

    form.addEventListener('submit', (e) => {
        e.preventDefault()
        if (!isPopupOpen) {
            const isFormValid = validateForm(form)
            console.log(isFormValid)
            if (isFormValid) {
                openPopup()
                sendMail()
            } else {
                openErrorPopup()
            }
        }
    })

    function sendMail() {

        const formData = new FormData ()

        formData.append('name', form.name.value.trim())
        formData.append('email', form.email.value.trim())
        formData.append('phone', form.phone.value.trim())
        formData.append('comment', form.textarea.value.trim())

        fetch('mail.php', {
            method: 'POST',
            body: formData
        }).then(res => console.log(res)).catch(e => console.log(e))

        console.log(formData)
    }


    const phoneMask = IMask(
        phoneInput, {
            mask: '+ {7} (000) 000-00-00'
        });
}

function validateForm(form) {
    const phoneFormatError = 'Должен содержать 11 цифр',
        emailFormatError = 'Должен содержать "." и "@"',
        requiredError = 'Поле необходимо заполнить',
        inputErrorClass = 'error'

    const setError = ({id, text = ''}) => {
        const input = document.getElementById(id)
        input.classList.add(inputErrorClass)
        input.nextElementSibling.textContent = text
    }

    const removeError = (id) => {
        const input = document.getElementById(id)
        input.classList.remove(inputErrorClass)
        input.nextElementSibling.textContent = ''
    }

    const errors = []
    Array.from([form.name, form.email, form.phone]).forEach(input => {
        removeError(input.id)
        const isPhoneError = () => {
            const stringOfNumbers = input.value.trim().split('').reduce((str, item) => Number(item) ? str + item : str, '')
            console.log(stringOfNumbers)
            return stringOfNumbers.length !== 11
        }
        const isEmailError = !input.value.includes('.') || !input.value.includes('@')
        const isInputHasAlreadyError = () => errors.some(error => error.id === input.id)
        const isInputEmpty = !input.value.trim()
        if (isInputEmpty) {
            errors.push({id: input.id, text: requiredError})
        }

        if (input.id === 'phone' && !isInputHasAlreadyError() && isPhoneError()) {
            errors.push({id: input.id, text: phoneFormatError})
        }

        if (input.id === 'email' && !isInputHasAlreadyError() && isEmailError) {
            errors.push({id: input.id, text: emailFormatError})
        }

    })

    errors.forEach(error => setError(error))

    return !errors.length
}