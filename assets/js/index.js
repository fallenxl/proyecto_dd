const closeModal = () => {
    const modal = document.querySelector('.modal');
    modal.classList.remove('modal--active');

}

const openModal = () => {
    const modal = document.querySelector('.modal');
    modal.classList.add('modal--active');
}