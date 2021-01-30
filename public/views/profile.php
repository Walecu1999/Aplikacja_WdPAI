<div class="profile">
    <div class="user-image">
        <img src="public/uploads/<?= $profile['image']?>">
    </div>
    <div class="user-description">
        <h2> <?= $profile['name'].' '.$profile['surname']?> </h2>
        <a> <?= $profile['description']?></a>
        <button class="phone-button">Contact</button>
        <a class="number hidden-element">
            <?= $profile['phone']?>
        </a>
    </div>
</div>