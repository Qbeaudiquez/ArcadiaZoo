<?php foreach ($reviews as $review): ?>
<?php if($review["isVisible"] === 1): ?>
<div class="ratingContainer" style="
    width:100%;
    display:flex; 
    flex-direction:column;
    gap:7px;
    opacity:1;
    padding:20px">

    <h3 style="color:rgb(216, 227, 199);"> <?= htmlspecialchars($review["pseudo"]) ?></h3>
    <p style="color:rgb(216, 227, 199);"> <?= $review["review"] ?></p>


    <div id="rating-<?= $review['review_id'] ?>" class="rating">

    <img class="star" src="../../../asset/icon/star.svg" alt="star">
    <img class="star" src="../../../asset/icon/star.svg" alt="star">
    <img class="star" src="../../../asset/icon/star.svg" alt="star">
    <img class="star" src="../../../asset/icon/star.svg" alt="star">
    <img class="star" src="../../../asset/icon/star.svg" alt="star">
    </svg>

    </div>
</div>
<script>
    setRating(<?= $review['rating'] ?>, <?= $review['review_id'] ?>);
</script>
<?php endif; ?>
<?php endforeach; ?>
