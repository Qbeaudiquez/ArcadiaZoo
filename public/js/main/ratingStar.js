function setRating(rating, reviewId) {
    const stars = document.querySelectorAll(`#rating-${reviewId} .star`);
    
    stars.forEach((star, index) => {
        if (index < rating) {
            star.setAttribute("src", "../../../asset/icon/staryellow.svg");
        } else {
            star.setAttribute("src", "../../../asset/icon/star.svg");
        }
    });
}