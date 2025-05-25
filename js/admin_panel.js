const addProductBtn = document.querySelector('.admin__add--addBtn')
const popupCloseBtn = document.querySelector('.admin__contentContainer--closeBtn')
const popupShadow = document.querySelector('.admin__popup--shadow')
const popup = document.querySelector('.admin__popup')
const searchBtn = document.querySelector('#searchBtn')
const searchRes = document.querySelectorAll('.admin__product--name')
const adminProducts = document.querySelector('.admin__products')
const addForm = document.querySelector("#create-product-form");

searchBtn.addEventListener('click', () => {
    const searchBar = document.querySelector('#searchBar')
    adminProducts.innerHTML =''
    searchRes.forEach(element =>{
        if(element.innerHTML.includes(searchBar.value)){
            adminProducts.appendChild(element.parentElement)
        }
    })

    let searchResetBtn = document.createElement('i')
    searchResetBtn.classList.add('fa-solid', 'fa-x')
    searchResetBtn.setAttribute('id', 'resetSearchBtn')
    searchBtn.replaceWith(searchResetBtn)
    searchResetBtn = document.querySelector('#resetSearchBtn')
    searchResetBtn.addEventListener('click', () => {
        searchBar.value = ""
        adminProducts.innerHTML = ""
        searchRes.forEach(element =>{
            adminProducts.appendChild(element.parentElement)
        })
        searchResetBtn.replaceWith(searchBtn)
    })
    
    
})
addProductBtn.addEventListener('click', () => {
    popup.classList.add('visible')
    popupShadow.classList.add('visible')
})
popupCloseBtn.addEventListener('click', () => {
    popup.classList.remove('visible')
    popupShadow.classList.remove('visible')
})

addForm.addEventListener("submit", (e) => {
    const filename = document.querySelector('#filename').value
    const formData = new FormData(addForm);
    formData.append('filename', filename)
    fetch(`../../php/admin_panel/add_item.php`, {
        method: 'POST',
        body: formData
    })
    .then(
        window.location.reload()
    )
})