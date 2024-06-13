document.addEventListener('DOMContentLoaded', (event) => {
    const imageElement = document.getElementById('changeableImage');
    let isImage1 = true;

    imageElement.addEventListener('click', () => {
        if (isImage1) {
            imageElement.src = 'image2.jpg';
        } else {
            imageElement.src = 'image1.jpg';
        }
        isImage1 = !isImage1;
    });
});